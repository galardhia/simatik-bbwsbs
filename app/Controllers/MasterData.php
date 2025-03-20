<?php

namespace App\Controllers;

use App\Models\MasterDataModel;
use CodeIgniter\Controller;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
class MasterData extends Controller
{
    protected $masterDataModel;

    public function __construct()
    {
        $this->masterDataModel = new MasterDataModel();
    }

    public function master_data_apbn()
    {
        $data['assets'] = $this->masterDataModel->getAssetsByCategory(1); // 1 = APBN
        return view('barang/master_data_apbn', $data);
    }

    public function master_data_non_apbn()
    {
        $data['assets'] = $this->masterDataModel->getAssetsByCategory(2); // 2 = NON APBN
        return view('barang/master_data_non_apbn', $data);
    }

    public function generateQrCode($kode_barang, $NUP)
    {
        log_message('error', 'Testing error logging in generateQrCode()');

        try {
            $data = $kode_barang . '/' . $NUP;

            // Buat QR Code
            $qrCode = new QrCode($data);
            $qrCode->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
                ->setSize(200)
                ->setMargin(10)
                ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin);

            $writer = new PngWriter();
            $result = $writer->write($qrCode);

            header('Content-Type: ' . $result->getMimeType());
            echo $result->getString();
        } catch (\Exception $e) {
            log_message('error', 'QR Code error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }

}
