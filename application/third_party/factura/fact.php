<?php

  /**
   *
   */

   require dirname(__FILE__) . '/robrichards/src/xmlseclibs.php';

   use RobRichards\XMLSecLibs\XMLSecurityDSig;
   use RobRichards\XMLSecLibs\XMLSecurityKey;

   require('lib/pclzip.lib.php'); // Librería que comprime archivos en .ZIP
   require('lib/sopa.php'); // Librería que comprime archivos en .ZIP



   require_once ("PDF417/vendor/autoload.php");
   use BigFish\PDF417\PDF417;
   use BigFish\PDF417\Renderers\ImageRenderer;




  class Fact
  {


    public function __construct($name = '10436146677-01-F002-00000027')
    {
      $this->url = base_url();
      $this->NomArch= $name;
    }


    public function getFiles()
    {

          //Contraseña del certificado
          $contraseña = '7777777';

          //Nombre del certificado con el formato .pfx
          $nombreArchivo = dirname(__FILE__).'/certificados/CERTIFICADO-DEMO-SUNAT.pfx';

          //Devolvemos el el certificado como un string (cadena)
          $pkcs12 = file_get_contents($nombreArchivo);

          //Declaramos un arreglo para recuperar los certificados
          $certificados = array();

          //Pasamos los parámetros
          $respuesta = openssl_pkcs12_read($pkcs12, $certificados, $contraseña);

          //Si la respuesta es TRUE es porque se ha recuperado correctamente los certificados
          if ($respuesta) {

              $publicKeyPem  = $certificados['cert']; //Archivo público
              $privateKeyPem = $certificados['pkey']; //Archivo privado

              //guardo la clave publica y privada en mi directorio en formato .pem
              file_put_contents(dirname(__FILE__).'/archivos_pem/private_key.pem', $privateKeyPem);
              file_put_contents(dirname(__FILE__).'/archivos_pem/public_key.pem', $publicKeyPem);
              // chmod(dirname(__FILE__)."/archivos_pem/private_key.pem", 0777);
              // chmod(dirname(__FILE__)."/archivos_pem/public_key.pem", 0777);

            return true;
          } else {
            return false;
          }

    }



    public function doFact($info,$prod)
    {

        $xml = new DomDocument('1.0', 'ISO-8859-1');

        $xml->standalone         = false;
        $xml->preserveWhiteSpace = false;

        $Invoice = $xml->createElement('Invoice');
        $Invoice = $xml->appendChild($Invoice);
        // Set the attributes.
        $Invoice->setAttribute('xmlns', 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2');
        $Invoice->setAttribute('xmlns:cac', 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $Invoice->setAttribute('xmlns:cbc', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $Invoice->setAttribute('xmlns:ccts', "urn:un:unece:uncefact:documentation:2");
        $Invoice->setAttribute('xmlns:ds', "http://www.w3.org/2000/09/xmldsig#");
        $Invoice->setAttribute('xmlns:ext', "urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2");
        $Invoice->setAttribute('xmlns:qdt', "urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2");
        $Invoice->setAttribute('xmlns:sac', "urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1");
        //$Invoice->setAttribute('xmlns:schemaLocation', "urn:oasis:names:specification:ubl:schema:xsd:Invoice-2 ../xsd/maindoc/UBLPE-Invoice-1.0.xsd");
        $Invoice->setAttribute('xmlns:udt', "urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2");

        $UBLExtension = $xml->createElement('ext:UBLExtensions');
        $UBLExtension = $Invoice->appendChild($UBLExtension);

        $ext = $xml->createElement('ext:UBLExtension');
        $ext = $UBLExtension->appendChild($ext);

        $contents = $xml->createElement('ext:ExtensionContent');
        $contents = $ext->appendChild($contents);

        $sac = $xml->createElement('sac:AdditionalInformation');
        $sac = $contents->appendChild($sac);

        $monetary = $xml->createElement('sac:AdditionalMonetaryTotal');
        $monetary = $sac->appendChild($monetary);

        $cbc = $xml->createElement('cbc:ID', '2005');
        $cbc = $monetary->appendChild($cbc);

        $cbc = $xml->createElement('cbc:PayableAmount', '0.00');
        $cbc = $monetary->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $monetary = $xml->createElement('sac:AdditionalMonetaryTotal');
        $monetary = $sac->appendChild($monetary);

        $cbc = $xml->createElement('cbc:ID', '1001');
        $cbc = $monetary->appendChild($cbc);

        $cbc = $xml->createElement('cbc:PayableAmount', $info['subtotal']);
        $cbc = $monetary->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $monetary = $xml->createElement('sac:AdditionalMonetaryTotal');
        $monetary = $sac->appendChild($monetary);

        $cbc = $xml->createElement('cbc:ID', '1002');
        $cbc = $monetary->appendChild($cbc);

        $cbc = $xml->createElement('cbc:PayableAmount', '0.00');
        $cbc = $monetary->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $monetary = $xml->createElement('sac:AdditionalMonetaryTotal');
        $monetary = $sac->appendChild($monetary);

        $cbc = $xml->createElement('cbc:ID', '1003');
        $cbc = $monetary->appendChild($cbc);

        $cbc = $xml->createElement('cbc:PayableAmount', '0.00');
        $cbc = $monetary->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '1000');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '1000 AV BOLIVIA');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '1002');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '1002 AAAAA');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '2000');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '2000 BBBB');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '2002');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '2002 CCC');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '2003');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '2003 DDD');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '2005');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '2005 EEE');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '2006');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '2006 AAAAA');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '2007');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '2007 GGG');
        $cbc = $aditional->appendChild($cbc);

        $aditional = $xml->createElement('sac:AdditionalProperty');
        $aditional = $sac->appendChild($aditional);

        $cbc = $xml->createElement('cbc:ID', '3000');
        $cbc = $aditional->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Value', '3000 FOB');
        $cbc = $aditional->appendChild($cbc);

        $sunat = $xml->createElement('sac:SUNATTransaction');
        $sunat = $sac->appendChild($sunat);

        $cbc = $xml->createElement('cbc:ID', '1');
        $cbc = $sunat->appendChild($cbc);

        $ext = $xml->createElement('ext:UBLExtension');
        $ext = $UBLExtension->appendChild($ext);

        $contents = $xml->createElement('ext:ExtensionContent', ' ');
        $contents = $ext->appendChild($contents);

        $cbc = $xml->createElement('cbc:UBLVersionID', '2.0');
        $cbc = $Invoice->appendChild($cbc);

        $cbc = $xml->createElement('cbc:CustomizationID', '1.0');
        $cbc = $Invoice->appendChild($cbc);

        $cbc = $xml->createElement('cbc:ID', 'F002-00000027');
        $cbc = $Invoice->appendChild($cbc);

        $cbc = $xml->createElement('cbc:IssueDate', $info['fecha']);
        $cbc = $Invoice->appendChild($cbc);

        $cbc = $xml->createElement('cbc:InvoiceTypeCode', '01');
        $cbc = $Invoice->appendChild($cbc);

        $cbc = $xml->createElement('cbc:DocumentCurrencyCode', 'PEN');
        $cbc = $Invoice->appendChild($cbc);

        $cac_signature = $xml->createElement('cac:Signature');
        $cac_signature = $Invoice->appendChild($cac_signature);

        $cbc = $xml->createElement('cbc:ID', '10436146677');
        $cbc = $cac_signature->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Note', 'Elaborado por Sistema de Emision Electronica Facturador SUNAT (SEE-SFS) 1.0.0');
        $cbc = $cac_signature->appendChild($cbc);

        $cbc = $xml->createElement('cbc:ValidatorID', '780086');
        $cbc = $cac_signature->appendChild($cbc);

        $cac_signatory = $xml->createElement('cac:SignatoryParty');
        $cac_signatory = $cac_signature->appendChild($cac_signatory);

        $cac = $xml->createElement('cac:PartyIdentification');
        $cac = $cac_signatory->appendChild($cac);

        $cbc = $xml->createElement('cbc:ID', '10436146677');
        $cbc = $cac->appendChild($cbc);

        $cac = $xml->createElement('cac:PartyName');
        $cac = $cac_signatory->appendChild($cac);

        $cbc = $xml->createElement('cbc:Name', 'DESARROLLO DE SISTEMAS INTEGRADOS DE GESTIÓN');
        $cbc = $cac->appendChild($cbc);

        $agent = $xml->createElement('cac:AgentParty');
        $agent = $cac_signatory->appendChild($agent);

        $cac = $xml->createElement('cac:PartyIdentification');
        $cac = $agent->appendChild($cac);

        $cbc = $xml->createElement('cbc:ID', '10436146677');
        $cbc = $cac->appendChild($cbc);

        $cac = $xml->createElement('cac:PartyName');
        $cac = $agent->appendChild($cac);

        $cbc = $xml->createElement('cbc:Name', $info['cli_nombre']);
        $cbc = $cac->appendChild($cbc);

        $cac = $xml->createElement('cac:PartyLegalEntity');
        $cac = $agent->appendChild($cac);

        $cbc = $xml->createElement('cbc:RegistrationName', $info['cli_nombre']);
        $cbc = $cac->appendChild($cbc);

        $cac_digital = $xml->createElement('cac:DigitalSignatureAttachment');
        $cac_digital = $cac_signature->appendChild($cac_digital);

        $cac = $xml->createElement('cac:ExternalReference');
        $cac = $cac_digital->appendChild($cac);

        $cbc = $xml->createElement('cbc:URI', 'SIGN');
        $cbc = $cac->appendChild($cbc);

        $cac_accounting = $xml->createElement('cac:AccountingSupplierParty');
        $cac_accounting = $Invoice->appendChild($cac_accounting);

        $cbc = $xml->createElement('cbc:CustomerAssignedAccountID', '10436146677');
        $cbc = $cac_accounting->appendChild($cbc);

        $cbc = $xml->createElement('cbc:AdditionalAccountID', '6');
        $cbc = $cac_accounting->appendChild($cbc);

        $cac_party = $xml->createElement('cac:Party');
        $cac_party = $cac_accounting->appendChild($cac_party);

        $cac = $xml->createElement('cac:PartyName');
        $cac = $cac_party->appendChild($cac);

        $cbc = $xml->createElement('cbc:Name', 'DESARROLLO DE SISTEMAS INTEGRADOS DE GESTIÓN');
        $cbc = $cac->appendChild($cbc);

        $address = $xml->createElement('cac:PostalAddress');
        $address = $cac_party->appendChild($address);

        $cbc = $xml->createElement('cbc:ID', '040101');
        $cbc = $address->appendChild($cbc);

        $cbc = $xml->createElement('cbc:StreetName', $info['cli_direccion']);
        $cbc = $address->appendChild($cbc);

        $country = $xml->createElement('cac:Country');
        $country = $address->appendChild($country);

        $cbc = $xml->createElement('cbc:IdentificationCode', 'PER');
        $cbc = $country->appendChild($cbc);

        $legal = $xml->createElement('cac:PartyLegalEntity');
        $legal = $cac_party->appendChild($legal);

        $cbc = $xml->createElement('cbc:RegistrationName', $info['cli_nombre']);
        $cbc = $legal->appendChild($cbc);

        $cac_accounting = $xml->createElement('cac:AccountingCustomerParty');
        $cac_accounting = $Invoice->appendChild($cac_accounting);

        $cbc = $xml->createElement('cbc:CustomerAssignedAccountID', $info['cli_ruc']);
        $cbc = $cac_accounting->appendChild($cbc);

        $cbc = $xml->createElement('cbc:AdditionalAccountID', '6');
        $cbc = $cac_accounting->appendChild($cbc);

        $cac_party = $xml->createElement('cac:Party');
        $cac_party = $cac_accounting->appendChild($cac_party);

        $legal = $xml->createElement('cac:PartyLegalEntity');
        $legal = $cac_party->appendChild($legal);

        $cbc = $xml->createElement('cbc:RegistrationName', 'VIP');
        $cbc = $legal->appendChild($cbc);

        $seller = $xml->createElement('cac:SellerSupplierParty');
        $seller = $Invoice->appendChild($seller);

        $cac_party = $xml->createElement('cac:Party');
        $cac_party = $seller->appendChild($cac_party);

        $address = $xml->createElement('cac:PostalAddress');
        $address = $cac_party->appendChild($address);

        $cbc = $xml->createElement('cbc:AddressTypeCode', '0');
        $cbc = $address->appendChild($cbc);

        $taxtotal = $xml->createElement('cac:TaxTotal');
        $taxtotal = $Invoice->appendChild($taxtotal);

        $cbc = $xml->createElement('cbc:TaxAmount', '18.00');
        $cbc = $taxtotal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $taxtsubtotal = $xml->createElement('cac:TaxSubtotal');
        $taxtsubtotal = $taxtotal->appendChild($taxtsubtotal);

        $cbc = $xml->createElement('cbc:TaxAmount', '18.00');
        $cbc = $taxtsubtotal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $taxtcategory = $xml->createElement('cac:TaxCategory');
        $taxtcategory = $taxtsubtotal->appendChild($taxtcategory);

        $taxscheme = $xml->createElement('cac:TaxScheme');
        $taxscheme = $taxtcategory->appendChild($taxscheme);

        $cbc = $xml->createElement('cbc:ID', '1000');
        $cbc = $taxscheme->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Name', 'IGV');
        $cbc = $taxscheme->appendChild($cbc);

        $cbc = $xml->createElement('cbc:TaxTypeCode', 'VAT');
        $cbc = $taxscheme->appendChild($cbc);

        $legal = $xml->createElement('cac:LegalMonetaryTotal');
        $legal = $Invoice->appendChild($legal);

        $cbc = $xml->createElement('cbc:AllowanceTotalAmount', '0.00');
        $cbc = $legal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $cbc = $xml->createElement('cbc:ChargeTotalAmount', '0.00');
        $cbc = $legal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $cbc = $xml->createElement('cbc:PayableAmount', $info['total']);
        $cbc = $legal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");


        foreach ($prod as $k => $v) {

        $InvoiceLine = $xml->createElement('cac:InvoiceLine');
        $InvoiceLine = $Invoice->appendChild($InvoiceLine);

        $cbc = $xml->createElement('cbc:ID', $k+1);
        $cbc = $InvoiceLine->appendChild($cbc);

        $cbc = $xml->createElement('cbc:InvoicedQuantity', $v['cot_cantidad']);
        $cbc = $InvoiceLine->appendChild($cbc);
        $cbc->setAttribute('unitCode', "ZZ");

        $cbc = $xml->createElement('cbc:LineExtensionAmount', $v['cot_precio']);
        $cbc = $InvoiceLine->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $pricing = $xml->createElement('cac:PricingReference');
        $pricing = $InvoiceLine->appendChild($pricing);

        $cac = $xml->createElement('cac:AlternativeConditionPrice');
        $cac = $pricing->appendChild($cac);

        $cbc = $xml->createElement('cbc:PriceAmount',$info['total']);
        $cbc = $cac->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $cbc = $xml->createElement('cbc:PriceTypeCode', '01');
        $cbc = $cac->appendChild($cbc);

        $allowance = $xml->createElement('cac:AllowanceCharge');
        $allowance = $InvoiceLine->appendChild($allowance);

        $cbc = $xml->createElement('cbc:ChargeIndicator', 'false');
        $cbc = $allowance->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Amount', '0.00');
        $cbc = $allowance->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $taxtotal = $xml->createElement('cac:TaxTotal');
        $taxtotal = $InvoiceLine->appendChild($taxtotal);

        $cbc = $xml->createElement('cbc:TaxAmount', '18.00');
        $cbc = $taxtotal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $taxtsubtotal = $xml->createElement('cac:TaxSubtotal');
        $taxtsubtotal = $taxtotal->appendChild($taxtsubtotal);

        $cbc = $xml->createElement('cbc:TaxableAmount', '18.00');
        $cbc = $taxtsubtotal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $cbc = $xml->createElement('cbc:TaxAmount', '18.00');
        $cbc = $taxtsubtotal->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

        $taxtcategory = $xml->createElement('cac:TaxCategory');
        $taxtcategory = $taxtsubtotal->appendChild($taxtcategory);

        $cbc = $xml->createElement('cbc:TaxExemptionReasonCode', '10');
        $cbc = $taxtcategory->appendChild($cbc);

        $taxscheme = $xml->createElement('cac:TaxScheme');
        $taxscheme = $taxtcategory->appendChild($taxscheme);

        $cbc = $xml->createElement('cbc:ID', '1000');
        $cbc = $taxscheme->appendChild($cbc);

        $cbc = $xml->createElement('cbc:Name', 'IGV');
        $cbc = $taxscheme->appendChild($cbc);

        $cbc = $xml->createElement('cbc:TaxTypeCode', 'VAT');
        $cbc = $taxscheme->appendChild($cbc);




        $item = $xml->createElement('cac:Item');
        $item = $InvoiceLine->appendChild($item);

        if (isset($v['pro_nombre'])) {
        $nom_prod = $v['pro_nombre'] ;
        }else {
        $nom_prod = $v['nom_prod'];
        }

        $cbc = $xml->createElement('cbc:Description', $nom_prod);
        $cbc = $item->appendChild($cbc);

        $sellers = $xml->createElement('cac:SellersItemIdentification');
        $sellers = $item->appendChild($sellers);

        $cbc = $xml->createElement('cbc:ID', 'ALM');
        $cbc = $sellers->appendChild($cbc);

        $additional = $xml->createElement('cac:AdditionalItemIdentification');
        $additional = $item->appendChild($additional);

        $cbc = $xml->createElement('cbc:ID', 'A');
        $cbc = $additional->appendChild($cbc);

        $price = $xml->createElement('cac:Price');
        $price = $InvoiceLine->appendChild($price);

        if (isset($v['cot_p_uni'])) {
          $pre_prod = $v['cot_p_uni'] ;
        }else {
          $pre_prod = $v['cot_precio'];
        }
        $cbc = $xml->createElement('cbc:PriceAmount',$pre_prod);
        $cbc = $price->appendChild($cbc);
        $cbc->setAttribute('currencyID', "PEN");

      }



        $xml->formatOutput = true;
        $strings_xml       = $xml->saveXML();
        $xml->save(dirname(__FILE__).'/factura-sin-firmar/'.$this->NomArch.'.xml');

        chmod(dirname(__FILE__).'/factura-sin-firmar/'.$this->NomArch.'.xml', 0777);

        //echo '<span style="color: #015B01; font-size: 15pt;">Factura creada:</span>&nbsp;';
        //echo '<span style="color: #B21919; font-size: 15pt;">10436146677-01-F002-00000027.xml</span><br>';



    }


    public function signFact()
    {

            // Cargar el XML a firmar
            $doc = new DOMDocument();
            $doc->load(dirname(__FILE__).'/factura-sin-firmar/'.$this->NomArch.'.xml');

            // Crear un nuevo objeto de seguridad
            $objDSig = new XMLSecurityDSig();

            // Utilizar la canonización exclusiva de c14n
            $objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);

            // Firmar con SHA-256
            $objDSig->addReference(
                $doc,
                XMLSecurityDSig::SHA1,
                array('http://www.w3.org/2000/09/xmldsig#enveloped-signature'),
                array('force_uri' => true)
            );

            //Crear una nueva clave de seguridad (privada)
            $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, array('type' => 'private'));

            //Cargamos la clave privada
            $objKey->loadKey(dirname(__FILE__).'/archivos_pem/private_key.pem', true);
            $objDSig->sign($objKey);

            // Agregue la clave pública asociada a la firma
            $objDSig->add509Cert(file_get_contents(dirname(__FILE__).'/archivos_pem/public_key.pem'), true, false, array('subjectName' => true));

            // Anexar la firma al XML
            $objDSig->appendSignature($doc->getElementsByTagName('ExtensionContent')->item(1));

            // Guardar el XML firmado
            $doc->save(dirname().'temp_fact/'.$this->NomArch.'.xml');
            chmod(dirname().'temp_fact/'.$this->NomArch.'.xml', 0777);

            //echo '<span style="color: #015B01; font-size: 15pt;">Factura firmada:</span>&nbsp;';
            //echo '<span style="color: #B21919; font-size: 15pt;">10436146677-01-F002-00000027.xml</span><br>';

    }


    public function sendFact()
    {

      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16pt; color: #000000; margin-bottom: 10px;">';
      //echo 'SUNAT. Facturación electrónica Perú.<br>';
      //echo '<span style="color: #6A0888; font-size: 15pt;">';
      //echo 'Envío de factura electrónica al servidor de SUNAT<br>';
      //echo 'y obtención de la Constancia de Recepción (CDR).';
      //echo '</span>';
      //echo '<hr width="100%"></div>';


      // NOMBRE DE ARCHIVO A PROCESAR.



      ## =============================================================================
      ## Creación del archivo .ZIP
      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #000099; margin-bottom: 10px;">';
      //echo 'Archivo .XML (factura electrónica) a comprimir.<br>';
      //echo '<span style="color: #000000;">'.$this->NomArch.'.xml</span>';
      //echo '</div>';

      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #000099; margin-bottom: 10px;">';
      //echo 'Archivo .ZIP (conteniendo el doc. electrónico) a enviar al servidor de SUNAT.<br>';
      //echo '<span style="color: #000000;">'.$this->NomArch.'.zip</span>';
      //echo '</div>';

      $zip = new PclZip(dirname().'temp_fact/'.$this->NomArch.".zip");
      $zip->add(dirname().'temp_fact/'.$this->NomArch.".xml",PCLZIP_OPT_REMOVE_PATH, 'temp_fact');
      chmod(dirname().'temp_fact/'.$this->NomArch.".zip", 0777);




      function soapCall($wsdlURL, $callFunction = "", $XMLString)
      {
          $client = new feedSoap($wsdlURL, array('trace' => true));
          $reply  = $client->SoapClientCall($XMLString);

          ////echo "REQUEST:\n" . $client->__getFunctions() . "\n";
          $client->__call("$callFunction", array(), array());
          //$request = prettyXml($client->__getLastRequest());
          ////echo highlight_string($request, true) . "<br/>\n";
          return $client->__getLastResponse();
      }

      //URL para enviar las solicitudes a SUNAT
      $wsdlURL = 'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl';

      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #000099; margin-bottom: 10px;">';
      //echo 'URL Beta de SUNAT:<br>';
      //echo '<span style="color: #000000;">'.$wsdlURL.'</span>';
      //echo '</div>';

      //Estructura del XML para la conexión
    $XMLString = '<?xml version="1.0" encoding="UTF-8"?>
      <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service.sunat.gob.pe" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
       <soapenv:Header>
           <wsse:Security>
               <wsse:UsernameToken Id="ABC-123">
                   <wsse:Username>10436146677MODDATOS</wsse:Username>
                   <wsse:Password>MODDATOS</wsse:Password>
               </wsse:UsernameToken>
           </wsse:Security>
       </soapenv:Header>
       <soapenv:Body>
           <ser:sendBill>
              <fileName>'.$this->NomArch.'.zip</fileName>
              <contentFile>' . base64_encode(file_get_contents(dirname().'temp_fact/'.$this->NomArch.'.zip')) . '</contentFile>
           </ser:sendBill>
       </soapenv:Body>
      </soapenv:Envelope>';

      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #000099;">';
      //echo 'SOAP de envío al servidor de SUNAT con el método sendBill.';
      //echo '</div>';
      //echo $XMLString;


      //Realizamos la llamada a nuestra función

      $result = soapCall($wsdlURL, $callFunction="sendBill", $XMLString);

      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #000099; margin-top: 10px;">';
      //echo 'Respuesta del servidor de SUNAT:<br>';
      //echo '<span style="color: #000000;">'.$result.'</span>';
      //echo '</div>';

      //Descargamos el Archivo Response
      $archivo = fopen(dirname().'temp_fact/'.'C'.$this->NomArch.'.xml','w+');
      fputs($archivo,$result);
      fclose($archivo);


      /*LEEMOS EL ARCHIVO XML*/


      $xml = simplexml_load_file(dirname().'temp_fact/'.'C'.$this->NomArch.'.xml');
      foreach ($xml->xpath('//applicationResponse') as $response){ }

      /*AQUI DESCARGAMOS EL ARCHIVO CDR(CONSTANCIA DE RECEPCIÓN)*/
      $cdr=base64_decode($response);
      $archivo = fopen(dirname().'temp_fact/'.'R-'.$this->NomArch.'.zip','w+');
      fputs($archivo,$cdr);
      fclose($archivo);
      chmod(dirname().'temp_fact/'.'R-'.$this->NomArch.'.zip', 0777);
      chmod(dirname().'temp_fact/'.'C'.$this->NomArch.'.xml', 0777);

      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #000099; margin-top: 10px;">';
      //echo 'Archivo .ZIP recibido.<br>';
      //echo '<span style="color: #000000;">R-'.$this->NomArch.'.zip</span>';
      //echo '</div>';

      $archive = new PclZip(dirname().'temp_fact/'.'R-'.$this->NomArch.'.zip');
      if ($archive->extract(PCLZIP_OPT_PATH, "temp_fact" ,PCLZIP_OPT_REMOVE_ALL_PATH)==0) {
          die("Error : ".$archive->errorInfo(true));
      }else{
          chmod(dirname().'temp_fact/'.'R-'.$this->NomArch.'.xml', 0777);
      }

      //echo '<div style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #000099; margin-top: 10px;">';
      //echo 'Archivo .XML constancia de recepción (CRD) ya descomprimido.<br>';
      //echo '<span style="color: #A70202;">R-'.$this->NomArch.'.xml</span>';
      //echo '</div>';



      /*DAMOS PERMISO A LOS ARCHIVOS PARA ELIMINAR*/
      // chmod(dirname().'temp_fact/'.'C'.$this->NomArch.'.xml', 0777);
      // chmod(dirname().'temp_fact/'.$this->NomArch.'.xml', 0777);
      // chmod(dirname().'temp_fact/'.'R-'.$this->NomArch.'.zip', 0777);
      // chmod(dirname().'temp_fact/'.'R-'.$this->NomArch.'.xml', 0777);
      // chmod(dirname().'temp_fact/'.$this->NomArch.'.zip', 0777);

      /*Eliminamos el Archivo Response*/
      // unlink(dirname().'temp_fact/'.'C'.$this->NomArch.'.xml');
      // unlink(dirname().'temp_fact/'.$this->NomArch.'.xml');
      // unlink(dirname().'temp_fact/'.'R-'.$this->NomArch.'.zip');
      // unlink(dirname().'temp_fact/'.'R-'.$this->NomArch.'.xml');
      // unlink(dirname().'temp_fact/'.$this->NomArch.'.zip');




    }


    public function makePdf($info, $res2)
    {



            // Variables correspondientes a la factura.
            $RUC = "a";       // RUC.
            $NomRazSoc = "a"; // Nombre o Razón social.
            $FecEmi = "a";    // Fecha de emisión.
            $Domicilio = "a"; // Domicilio.
            $CodHash = "a";   // Código Hash.
            $TipoDoc = "a";   // Tipo de documento.
            $TotGrav = 0;    // Total gravado.
            $TotIGV = 0;     // Total IGV.
            $TotMonto = 0;   // Total importe.

            // Variables correspondientes a los productos o servicios de la factura.

            $CodProdServ = array(); // Código.
            $ProdServ = array(); // Descripción.
            $Cant = array(); // Cantidad.
            $UniMed = array(); // Unidad de medida.
            $Precio = array(); // Precio unitario.
            $Importe = array();  // Importe.


            // Obteniendo datos del archivo .XML (factura electrónica)======================
            ob_start();
            $xml = file_get_contents(dirname().'temp_fact/'.$this->NomArch.'.xml');

            #== Obteniendo datos del archivo .XML

                $DOM = new DOMDocument('1.0', 'ISO-8859-1');
                $DOM->preserveWhiteSpace = FALSE;
                $DOM->loadXML($xml);

                ### DATOS DE LA FACTURA ####################################################

                // Obteniendo RUC.
                $DocXML = $DOM->getElementsByTagName('CustomerAssignedAccountID');
                    foreach($DocXML as $Nodo){
                    $RUC = $Nodo->nodeValue;
                }

                // Obteniendo Fecha de emisión.
                $DocXML = $DOM->getElementsByTagName('IssueDate');
                foreach($DocXML as $Nodo){
                    $FecEmi = $Nodo->nodeValue;
                }

                // Obteniendo Nombre o Razón social.
                $DocXML = $DOM->getElementsByTagName('RegistrationName');
                $i=0;
                foreach($DocXML as $Nodo){
                    if ($i==0){
                        $NomRazSoc = $Nodo->nodeValue;
                    }
                    $i++;
                }

                // Obteniendo domicilio.
                $DocXML = $DOM->getElementsByTagName('StreetName');
                $i=0;
                foreach($DocXML as $Nodo){
                    if ($i==0){
                        $Domicilio = $Nodo->nodeValue;
                    }
                    $i++;
                }

                // Obteniendo Codigo Hash.
                $DocXML = $DOM->getElementsByTagName('DigestValue');
                $i=0;
                foreach($DocXML as $Nodo){
                    if ($i==0){
                        $CodHash = $Nodo->nodeValue;
                    }
                    $i++;
                }

                // Clave del tipo de documento.
                $DocXML = $DOM->getElementsByTagName('InvoiceTypeCode');
                $i=0;
                foreach($DocXML as $Nodo){
                    if ($i==0){
                        $TipoDoc = $Nodo->nodeValue;
                    }
                    $i++;
                }


                ### DATOS DEL PRODUCTO O SERVICIO. #########################################

                // Código del producto o servicio.
                $DocXML = $DOM->getElementsByTagName('PriceTypeCode');
                $i=0;
                foreach($DocXML as $k => $Nodo){

                        $CodProdServ[$k]['cod'] = $Nodo->nodeValue;
                }

                // Descripción del producto o servicio.
                $DocXML = $DOM->getElementsByTagName('Description');
                $i=0;

                foreach($DocXML as $k => $Nodo){

                        $ProdServ[$k]['prod'] = $Nodo->nodeValue;

                }


                // Cantidad de producto o servicio.
                $DocXML = $DOM->getElementsByTagName('InvoicedQuantity');
                $i=0;

                foreach($DocXML as $k => $Nodo){

                        $Cant[$k]['cant'] = $Nodo->nodeValue;

                }

                // // Unidad de medida del producto o servicio.
                // $DocXML = $DOM->getElementsByTagName('InvoicedQuantity');
                // $i=0;
                // foreach($DocXML as $k => $Nodo){
                //
                //         $UniMed[$k]['uni'] = $Nodo->getAttribute('unitCode');
                //
                // }

                // Precio unitario.
                $DocXML = $DOM->getElementsByTagName('PriceAmount');
                $i=0;
                foreach($DocXML as $k => $Nodo){

                        $Precio[$k]['pre'] = $Nodo->nodeValue;

                }

                // Importe.
                $DocXML = $DOM->getElementsByTagName('LineExtensionAmount');
                $i=0;
                foreach($DocXML as $k => $Nodo){

                        $Importe[$k]['imp'] = $Nodo->nodeValue;

                }

                ### TOTALES DE LA FACTURA ##################################################

                // Total gravado.
                $DocXML = $DOM->getElementsByTagName('PayableAmount');
                $i=0;
                foreach($DocXML as $Nodo){
                    if ($i==1){
                        $TotGrav = $Nodo->nodeValue;
                    }
                    $i++;
                }

                // Total IGV.
                $DocXML = $DOM->getElementsByTagName('TaxAmount');
                $i=0;
                foreach($DocXML as $Nodo){
                    $TotIGV = $Nodo->nodeValue;
                }

                // Monto total.
                $DocXML = $DOM->getElementsByTagName('PayableAmount');
                $i=0;
                foreach($DocXML as $Nodo){
                    $TotMonto = $Nodo->nodeValue;
                }


            // Crear el gráfico con el código de barras. ===================================
            $textoCodBar =
               "| $TipoDoc
                | A
                | 123
                | $TotIGV
                | $TotMonto
                | $FecEmi
                | $TipoDoc
                | F002-026
                | VALOR RESUMEN
                | $CodHash
                |";

            $pdf417 = new PDF417();
            $codigo_barra = $pdf417->encode($textoCodBar);

            // Create a PNG image
            $renderer = new ImageRenderer([
                'format' => 'png'
            ]);

            $image = $renderer->render($codigo_barra);
            $image->save(dirname().'temp_fact/'.$this->NomArch.'.png');


            //= Creación del documetno .PDF ================================================



            $this->NomArchPDF = $this->NomArch.'.pdf';




            $pdf=new PDF();
            $pdf->AddPage();
            $pdf->Image(base_url().'img/empresas/'.$res2[0]->img,20,8,30);
            $pdf->Header(utf8_decode("FACTURA ELECTRÓNICA"));

            // Define el alias para el número de página que se imprimirá en el pie
            $pdf->AliasNbPages();

            /* Se define el titulo, márgenes izquierdo, derecho y
             * el color de relleno predeterminado
             */


            $pdf->SetTitle(utf8_decode("FACTURA ELECTRÓNICA"));
            $pdf->SetLeftMargin(15);
            $pdf->SetRightMargin(15);
            $pdf->SetFillColor(200,200,200);

            // $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetFont('Arial', 'B', 13);


            //
            // $pdf->SetTextColor(170,0,0);
            // // $pdf->SetFont('Arial', 'B', 13);
            // $pdf->Cell(90,7,$res2[0]->emp_ruc.'','',0,'L');
            // // $pdf->Ln(7);


              $pdf->SetTextColor(170,0,0);
            // $pdf->SetFont('Arial', 'B', 13);
            $pdf->SetY(10);
            $pdf->Cell(325,7,$res2[0]->emp_ruc.'','',1,'C');
            // $pdf->Ln(7);


            // $pdf->SetTextColor(0,0,0);
            // // $pdf->SetFont('Arial', 'B', 13);
            // $pdf->Cell(90,7,$FecEmi.'','',0,'L');
            // // $pdf->Ln(7);

            $pdf->SetTextColor(0,0,0);
            // $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(325,7,$FecEmi.'','',1,'C');
            // $pdf->Ln(7);
            //
            // $pdf->SetTextColor(0,0,150);
            // // $pdf->SetFont('Arial', 'B', 13);
            // $pdf->Cell(90,7,strtoupper($info['prefijo']).$info['serie'].'-'.$info['numero'].'','',0,'L');
            //

            $pdf->SetTextColor(0,0,150);
            // $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(325,7,strtoupper(trim($info['prefijo'])).trim($info['serie']).'-'.trim($info['numero']).'','',1,'C');


            $pdf->Ln(8);


            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetTextColor(0,0,0);
            $pdf->Cell(180,7,utf8_decode("Representación impresa de la factura electrónica    "), 0, 1,'R', 0);

            // $pdf->Cell(90,7,'Informacion del Cliente','',0,'L');
            // $pdf->Cell(90,7,'Informacion de la Empresa','',0,'R');
            // $pdf->Ln(7);


            $datos = [utf8_decode('Señores:'),utf8_decode('Direccion'),'RUC:'];
            $datos1 = [utf8_decode($NomRazSoc),utf8_decode($Domicilio),utf8_decode($RUC)];


            $datos2 = ['Nombre:','Ruc:','Correo:'];
            $datos3 = [utf8_decode($res2[0]->emp_nombre),utf8_decode($res2[0]->emp_ruc),utf8_decode($res2[0]->correo_empresa)];

            for ($i=0; $i < 3; $i++) {

             $pdf->SetFont('Arial', 'B', 12);
             $pdf->Cell(30,7,$datos[$i],'',0,'L','0');
             $pdf->SetFont('Arial', '', 12);
             $pdf->Cell(50,5,$datos1[$i],'',0,'L');
             $pdf->SetFont('Arial', 'B', 12);
             $pdf->Cell(50,5,'',0,'L','0');
             $pdf->SetFont('Arial', '', 12);
             // $pdf->Cell(50,5,$datos3[$i],'',0,'R');
             $pdf->Ln(5);

            }

            $pdf->Ln(15);




            // $pdf->SetTextColor(170,0,0);
            // $pdf->SetFont('arial','',14);
            // $pdf->SetXY(12,1.5);
            // $pdf->Cell(8, 0.25, $res2[0]->emp_ruc, 0, 1,'C', 0);

            // $pdf->SetTextColor(0,0,0);
            // $pdf->SetFont('arial','B',14);
            // $pdf->SetXY(12,2.2);
            // $pdf->Cell(8, 0.25, utf8_decode("FACTURA ELECTRÓNICA"), 0, 1,'C', 0);
            //
            //
            // $pdf->SetTextColor(0,0,150);
            // $pdf->SetFont('arial','',14);
            // $pdf->SetXY(12,2.9);
            // $pdf->Cell(8, 0.25, strtoupper($info['prefijo']).$info['serie'].'-'.$info['numero'], 0, 1,'C', 0);
            //

            // // $pdf->RoundedRect(1, 4, 19, 3.2, 0.2, '');
            //
            // $pdf->SetTextColor(0,0,0);
            // $pdf->SetFont('arial','B',10);
            //
            // $pdf->SetXY(1.1,4.2);
            // $pdf->Cell(1, 0.35, utf8_decode("Señores: "), 0, 1,'L', 0);
            //
            // $pdf->SetXY(1.1,4.2+0.6);
            // $pdf->Cell(1, 0.35, utf8_decode("Dirección: "), 0, 1,'L', 0);
            //
            // $pdf->SetXY(1.1,4.2+(0.6*2));
            // $pdf->Cell(1, 0.35, utf8_decode("RUC: "), 0, 1,'L', 0);
            //
            // $pdf->SetXY(1.1,4.2+(0.6*3));
            // $pdf->Cell(1, 0.35, utf8_decode("Fecha de emisión: "), 0, 1,'L', 0);
            //
            // $pdf->SetXY(1.1,4.2+(0.6*4));
            // $pdf->Cell(1, 0.35, utf8_decode("Moneda: "), 0, 1,'L', 0);


            // $pdf->SetTextColor(0,0,0);
            // $pdf->SetFont('arial','',10);
            //
            // $pdf->SetXY(4.7,4.2);
            // $pdf->Cell(1, 0.35, utf8_decode($NomRazSoc), 0, 1,'L', 0);
            //
            // $pdf->SetXY(4.7,4.2+0.6);
            // $pdf->Cell(1, 0.35, utf8_decode($Domicilio), 0, 1,'L', 0);
            //
            // $pdf->SetXY(4.7,4.2+(0.6*2));
            // $pdf->Cell(1, 0.35, utf8_decode($RUC), 0, 1,'L', 0);
            //
            // $pdf->SetXY(4.7,4.2+(0.6*3));
            // $pdf->Cell(1, 0.35, utf8_decode($FecEmi), 0, 1,'L', 0);
            //
            // $pdf->SetXY(4.7,4.2+(0.6*4));
            // $pdf->Cell(1, 0.35, utf8_decode("SOL"), 0, 1,'L', 0);


            $X = 0;
            $Y = 0;

            // $pdf->SetTextColor(0,0,0);
            // $pdf->SetFont('arial','',10);
            //
            // $pdf->SetXY($X+1,$Y+8);
            // $pdf->Cell(2.5, 0.5, utf8_decode("Código"), 1, 1,'L', 0);
            //
            // $pdf->SetXY($X+3.5,$Y+8);
            // $pdf->Cell(6.65, 0.5, utf8_decode("Descripción"), 1, 1,'L', 0);
            //
            // $pdf->SetXY($X+10.15,$Y+8);
            // $pdf->Cell(2, 0.5, utf8_decode("Cantidad"), 1, 1,'C', 0);
            //
            // $pdf->SetXY($X+12.15,$Y+8);
            // $pdf->Cell(3.3, 0.5, utf8_decode("Precio unitario"), 1, 1,'R', 0);
            //
            // $pdf->SetXY($X+15.45,$Y+8);
            // $pdf->Cell(4.55, 0.5, utf8_decode("Precio venta"), 1, 1,'R', 0);


            //HERE
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(180,7,'Productos','TBLR',0,'C','1');
            $pdf->Ln(7);

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(5,7,'#','BLR',0,'C',1);
            $pdf->Cell(110,7,'Producto','BLR',0,'L',1);
            // $pdf->Cell(60,7,'Descripcion','BLR',0,'L',1);
            $pdf->Cell(21,7,'Cantidad','BLR',0,'C',1);
            $pdf->Cell(22,7,'Pr. Lista','BLR',0,'C',1);
            $pdf->Cell(22,7,'Total','BLR',1,'C',1);


            $precio=array();
            $j = 0;
            for ($i=0; $i < count($Precio) ; $i++) {
              if ($i%2 == 1) {
                $precio[$j]['pre'] = $Precio[$i]['pre'];
                $j++;
              }
            }

            for ($i=0; $i < count($ProdServ); $i++) {
               $pdf->Cell(5,7,$i+1,'BLR',0,'C');
               $pdf->Cell(110,7,utf8_decode($ProdServ[$i]['prod']),'BLR',0,'L');
               $pdf->Cell(21,7, utf8_decode($Cant[$i]['cant']), 'BLR',0,'C');
               $pdf->Cell(22,7, number_format($precio[$i]['pre'],2),'BLR',0,'C');
               $pdf->Cell(22,7, number_format($Importe[$i]['imp'],2), 'BLR',1,'C');
            }

            $pdf->Cell(0,7,'Subtotal: '.number_format($TotGrav,2).'       ','TLR',1,'R',1);
            $pdf->Cell(0,7,'Igv(18%): '.number_format($info['igv'],2).'       ','LR',1,'R',1);
            $pdf->Cell(0,7,'Total:    '.number_format($TotMonto,2).'       ','LR',1,'R',1);

            $pdf->Cell(180,0,'','TB',1,'L');

            //
            // $Y = $Y + 0.5;
            // //Codigo de producto
            // $p=0.8;
            // foreach ($CodProdServ as $key ) {
            //
            //   $pdf->SetXY($X+1,$Y+8);
            //   $pdf->Cell(2.5, $p, utf8_decode($key['cod']), 1, 1,'L', 0);
            //   $p+= 0.8;
            //
            //
            // }
            //
            // //Descripcion de producto
            // $p=0.8;
            // $o = 0;
            // foreach ($ProdServ as $key ) {
            //
            //   $pdf->SetXY($X+3.5,$Y+8);
            //   $pdf->Cell(6.65,$p, utf8_decode($key['prod']), 1, 1,'L', 0);
            //   $p+= 0.8;
            // }
            //
            //
            // $p=0.8;
            // foreach ($Cant as $key ) {
            //
            //   $pdf->SetXY($X+10.15,$Y+8);
            //   $pdf->Cell(2, $p, utf8_decode($key['cant']), 1, 1,'C', 0);
            //   $p+= 0.8;
            //
            // }
            //
            //
            // $p=0.8;
            // foreach ($UniMed as $key ) {
            //
            //   $pdf->SetXY($X+12.15,$Y+8);
            //   $pdf->Cell(2.65,$p, utf8_decode($key['uni']), 1, 1,'L', 0);
            //   $p+= 0.8;
            //
            // }
            //
            // $p=0.8;
            // $def = false;
            // foreach ($Precio as $key ) {
            //
            //   if ($def) {
            //     $pdf->SetXY($X+12.15,$Y+8);
            //     $pdf->Cell(3.3, $p, number_format($key['pre'],2), 1, 1,'R', 0);
            //     $p+= 0.8;
            //   }
            //
            //   if (!$def) {
            //     $def = true;
            //   } else {
            //     $def = false;
            //   }
            //
            // }
            //
            // $p=0.8;
            // foreach ($Importe as $key ) {
            //
            //   $pdf->SetXY($X+15.45,$Y+8);
            //   $pdf->Cell(4.55, $p, number_format($key['imp'],2), 1, 1,'R', 0);
            //   $p+= 0.8;
            //
            // }

            $pdf->Ln(10);
            $pdf->image(dirname().'temp_fact/'.$this->NomArch.'.png',107, 45, 90, 30);

            // $pdf->SetTextColor(0,0,0);
            // $pdf->SetFont('arial','',10);
            //
            // $pdf->SetXY(9.9,$p+10);
            // $pdf->Cell(7.6, 0.5, utf8_decode("Total Valor de Venta - Operaciones Gravadas:"), 1, 1,'R', 0);
            //
            // $pdf->SetXY(17.5,$p+10);
            // $pdf->Cell(2.5, 0.5, number_format($TotGrav,2), 1, 1,'R', 0);
            //
            // $pdf->SetXY(9.9,$p+10+0.5);
            // $pdf->Cell(7.6, 0.5, utf8_decode("IGV:"), 1, 1,'R', 0);
            //
            // $pdf->SetXY(17.5,$p+10+0.5);
            // $pdf->Cell(2.5, 0.5, number_format($TotIGV,2), 1, 1,'R', 0);
            //
            // $pdf->SetXY(9.9,$p+10+(0.5*2));
            // $pdf->Cell(7.6, 0.5, utf8_decode("Importe Total:"), 1, 1,'R', 0);
            //
            // $pdf->SetXY(17.5,$p+10+(0.5*2));
            // $pdf->Cell(2.5, 0.5, number_format($TotMonto,2), 1, 1,'R', 0);
            //
            // $pdf->line(1, 24.8, 20.5, 24.8);

            $pdf->SetTextColor(0,0,0);
            $pdf->SetFont('arial','',9);
            $pdf->Ln(30);
            $pdf->MultiCell(180, 5, utf8_decode("Representación Impresa de la Factura ElectrónicaCódigo Hash: $CodHash  Autorizado para ser Emisor electrónico mediante la Resolución de Intendencia N° 0180050002185/SUNAT  Para consultar el comprobante ingresar a : https://portal.efacturacion.pe/appefacturacion"), 0, 'C');

            //==============================================================================

            ob_end_clean();
            $pdf->Output(dirname().'temp_fact/'.$this->NomArchPDF, 'F'); // Se graba el documento .PDF en el disco duro o unidad de estado sólido.
            chmod (dirname().'temp_fact/'.$this->NomArchPDF,0777);  // Se dan permisos de lectura y escritura.
            // $pdf->Output($this->NomArchPDF, 'D'); // Se muestra el documento .PDF en el navegador.



    }


    public function move_file()
    {
       copy(dirname().'temp_fact/'.$this->NomArch.'.pdf', dirname().'f_files/'.$this->NomArch.'.pdf');
       copy(dirname().'temp_fact/'.$this->NomArch.'.xml', dirname().'x_files/'.$this->NomArch.'.xml');

       /*Eliminamos el Archivo Response*/

       unlink(dirname().'temp_fact/'.$this->NomArch.'.pdf');
       unlink(dirname().'temp_fact/'.$this->NomArch.'.png');
       unlink(dirname().'temp_fact/'.'C'.$this->NomArch.'.xml');
       unlink(dirname().'temp_fact/'.$this->NomArch.'.xml');
       unlink(dirname().'temp_fact/'.'R-'.$this->NomArch.'.zip');
       unlink(dirname().'temp_fact/'.'R-'.$this->NomArch.'.xml');
       unlink(dirname().'temp_fact/'.$this->NomArch.'.zip');

    }

  }






 ?>
