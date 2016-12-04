<?php

require_once('PHPMailer_v5.1/PHPMailer.php');

//require ('PHPMailer_v5.2/PHPMailerAutoload.php');

class Email
{

    private $objMailer;

    public function __construct()
    {

        $this->objMailer = new PHPMailer();

        $this->objMailer->SMTPDebug = 3;

        $this->objMailer->IsSMTP();
        $this->objMailer->Host = "smtp.sparkpostmail.com";
        $this->objMailer->Port = 587;
        $this->objMailer->SMTPSecure = 'tls';
        $this->objMailer->SMTPAuth = true;
        $this->objMailer->Username = 'SMTP_Injection';                 // SMTP username

        // You will need an API Key with 'Send via SMTP' permissions.
        $this->objMailer->Password = 'cce8fe784b79a07a766d2b8fc58166b3e00bb93b';


        // sparkpostbox.com is a sending domain used for testing
        // purposes and is limited to 50 messages per account.
        // Visit https://app.sparkpost.com/account/sending-domains
        // to register and verify your own sending domain.
        $this->objMailer->SetFrom('testing@sparkpostbox.com', 'Testing');

    }

    public function process($case = null, $array = null)
    {
        if (!empty($case)) {

            switch ($case) {
                case 1:
                    // add url to the array
                    $link = '<a href="' . SITE_URL . '/?page=activate&code=';
                    $link .= $array['hash'];
                    $link .= '">';
                    $link .= SITE_URL . '/?page=activate&code=';
                    $link .= $array['hash'];
                    $link .= '</a>';
                    $array['link'] = $link;

                    $this->objMailer->Subject = __('activate_account','default');

                    $this->objMailer->msgHTML($this->fetchEmail($case, $array));
                    $this->objMailer->addAddress(
                        $array['email'], $array['first_name'] . ' ' . $array['last_name']
                    );

                    break;
            }
            // send email
            $this->objMailer->isHTML(true);
            if ($this->objMailer->send()) {
                $this->objMailer->clearAddresses();
                return true;
            }
            return false;
        }
    }

    public function fetchEmail($case = null, $array = null)
    {
        if (!empty($case)) {

            if (!empty($array)) {
                foreach ($array as $key => $value) {
                    ${$key} = $value;
                }
            }

            ob_start();

            $lang = Session::getSession('language');

            require_once(EMAILS_PATH . DS . $case . "_".$lang.".php");
            $out = ob_get_clean();
            return $this->wrapEmail($out);
        }
    }

    public function wrapEmail($content = null)
    {
        if (!empty($content)) {
            return '<div style="font-family:Arial,Verdana,Sans-serif;font-size:12px;color:#333;line-height:21px;">' . $content . '</div>';
        }
    }


}
