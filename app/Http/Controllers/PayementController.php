<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionFormRequest;
use App\Models\Demande;
use App\Models\Parametre;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PayementController extends Controller
{
    public function store(TransactionFormRequest $request, Demande $demande)
    {
        
        DB::beginTransaction();
        $telephone = $request->telephone;
        $codeOtp = $request->otp;
        $montant = Parametre::first() ? Parametre::first()->montant_payement : config('main.payement.montant');
        $compteMarchand = Parametre::first() ? Parametre::first()->compte_marchand : config('main.payement.compteMarchand');
        $username = Parametre::first() ? Parametre::first()->username : config('main.payement.username');
        $password = Parametre::first() ? Parametre::first()->password : config('main.payement.password');
        
        if ($montant && $compteMarchand) {
            $status = self::pay($telephone, $montant, $codeOtp, $compteMarchand, $username, $password );
            
            // dd($status['status']);
            // $status = 200;
            if ($status['status'] == 200) {
                $demande->date_payement = now()->format('Y-m-d');
                $demande->montant_payement = $montant;
                $demande->status_paiement = true;
                if ($demande->save()) {
                    DB::commit();

                    return redirect()->route('listedemande', $demande)->with('success', 'Le payement des frais de votre demande a bien été effectuée avec succès');
                } else {
                    return redirect()->back()->with('danger', "Une erreure interne s'est produite. Veuillez réessayez. Si l'erreure persiste veuillez contacter l'administration");
                }
            } else {
                return redirect()->back()->with('warning', $status['message']);
            }
        } else {
            return redirect()->back()->with('danger', "Une erreue inconnue s'est produite. Veuillez réessayez. Si l'erreure persiste veuillez contacter l'administration");
        }
    }

    public static function pay($telephone, $montant, $codeOtp, $compteMarchand, $username, $password)
    {
        $customerMsisdn = $telephone;
        $merchantMsisdn = $compteMarchand;
        $apiUsername = $username;
        $apiPassword = $password;
        $amount = $montant;
        $provider = '101';
        $provider2 = '101';
        $payid = '12';
        $payid2 = '12';
        $otp = $codeOtp;
        $extTxnId = '';

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'text/xml;charset=utf-8',
            ])->send('POST', 'https://apiom.orange.bf:9007/payment', [
                'body' => '
                <?xml version="1.0" encoding="UTF-8"?>
                <COMMAND>
                <TYPE>OMPREQ</TYPE>
                <customer_msisdn>'.$customerMsisdn.'</customer_msisdn>
                <merchant_msisdn>'.$merchantMsisdn.'</merchant_msisdn>
                <api_username>'.$apiUsername.'</api_username>
                <api_password>'.$apiPassword.'</api_password>
                <amount>'.$amount.'</amount>
                <PROVIDER>'.$provider.'</PROVIDER>
                <PROVIDER2>'.$provider2.'</PROVIDER2>
                <PAYID>'.$payid.'</PAYID>
                <PAYID2>'.$payid2.'</PAYID2>
                <otp>'.$otp.'</otp>
                <reference_number>'.$extTxnId.'</reference_number>
                <ext_txn_id>'.$extTxnId.'</ext_txn_id>
                </COMMAND>
                            ',
                'verify' => false
            ]);
        } catch (Exception $th) {
            return $th;
        }

        $value = '<?xml version="1.0" encoding="UTF-8"?><document>'.$response->body().'</document>';

        $resXml = (array) simplexml_load_string($value);
    

        return $resXml;
        // return 200;
    }
}
