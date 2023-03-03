<?php

namespace Drupal\exchange_rates\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;

// Importing "ExchangeRate" class
require_once dirname(__DIR__) . "/ExchangeRate.php";

use ExchangeRate;

class ExchangeRatesForm extends FormBase
{
  use MessengerTrait;

  public function getFormId(): string
  {
    return "exchange_rates_form_id";
  }

  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    // ExchangeRate
    $rate = new ExchangeRate();
    $time = $rate->get_exchange_rates_time();
    $url = $rate->get_exchange_rates_url();
    $eur = round($rate->convert_currency("EUR"), 3);
    $gbp = round($rate->convert_currency("GBP"), 3);
    $cad = round($rate->convert_currency("CAD"), 3);
    $hkd = round($rate->convert_currency("HKD"), 3);
    $aud = round($rate->convert_currency("AUD"), 3);
    $sgd = round($rate->convert_currency("SGD"), 3);
    $cny = round($rate->convert_currency("CNY"), 3);
    $inr = round($rate->convert_currency("INR"), 3);

    // onchange str
    $eur_oninput = $this->convert_helper('eur_id', $eur);
    $gbp_oninput = $this->convert_helper('gbp_id', $gbp);
    $cad_oninput = $this->convert_helper('cad_id', $cad);
    $hkd_oninput = $this->convert_helper('hkd_id', $hkd);
    $aud_oninput = $this->convert_helper('aud_id', $aud);
    $sgd_oninput = $this->convert_helper('sgd_id', $sgd);
    $cny_oninput = $this->convert_helper('cny_id', $cny);
    $inr_oninput = $this->convert_helper('inr_id', $inr);

    // ===================================================== Form =====================================================
    $base_img_url = "/sites/default/files/inline-images";

    $form["#attached"]["library"][] = "exchange_rates/exchange_rate_library";  // css

    // Fieldset
    $form["fieldset"] = [
      "#type" => "fieldset",
      "#title" => "<img src='{$base_img_url}/buck.png' alt='' class='form-header-icon' />Курс і конвертер валют",
      "#attributes" => [
        "style" => "border-radius:4px;border:1px solid #000000;"
      ],
    ];

    // Inputs
    $form["fieldset"]["usd_input"] = [
      "#type" => "textfield",
      "#title" => "USD $",
      "#description" => "Долар США",
      "#value" => 1,
      "#attributes" => [
        "name" => "usd",
        "id" => "usd_id",
        "style" => "width:420px;",
        "oninput" => "{$eur_oninput}{$gbp_oninput}{$cad_oninput}{$hkd_oninput}
                      {$aud_oninput}{$sgd_oninput}{$cny_oninput}{$inr_oninput}"
      ]
    ];
    $form["fieldset"]["eur_input"] = [
      "#type" => "textfield",
      "#title" => "EUR<img src='{$base_img_url}/eu.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Євро",
      "#value" => "{$eur}",
      "#attributes" => [
        "name" => "eur",
        "id" => "eur_id",
        "style" => "width:420px;"
      ]
    ];
    $form["fieldset"]["gbp_input"] = [
      "#type" => "textfield",
      "#title" => "GBP<img src='{$base_img_url}/uk.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Фунт стерлінгів",
      "#value" => "{$gbp}",
      "#attributes" => [
        "name" => "gbp",
        "id" => "gbp_id",
        "style" => "width:420px;"
      ]
    ];
    $form["fieldset"]["cad_input"] = [
      "#type" => "textfield",
      "#title" => "CAD<img src='{$base_img_url}/ca.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Канадський долар",
      "#value" => "{$cad}",
      "#attributes" => [
        "name" => "cad",
        "id" => "cad_id",
        "style" => "width:420px;"
      ]
    ];
    $form["fieldset"]["hkd_input"] = [
      "#type" => "textfield",
      "#title" => "HKD<img src='{$base_img_url}/hk.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Гонконзький долар",
      "#value" => "{$hkd}",
      "#attributes" => [
        "name" => "hkd",
        "id" => "hkd_id",
        "style" => "width:420px;"
      ]
    ];
    $form["fieldset"]["aud_input"] = [
      "#type" => "textfield",
      "#title" => "AUD<img src='{$base_img_url}/au.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Австралійський долар",
      "#value" => "{$aud}",
      "#attributes" => [
        "name" => "aud",
        "id" => "aud_id",
        "style" => "width:420px;"
      ]
    ];
    $form["fieldset"]["sgd_input"] = [
      "#type" => "textfield",
      "#title" => "SGD<img src='{$base_img_url}/sg.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Сінгапурський долар",
      "#value" => "{$sgd}",
      "#attributes" => [
        "name" => "sgd",
        "id" => "sgd_id",
        "style" => "width:420px;"
      ]
    ];
    $form["fieldset"]["cny_input"] = [
      "#type" => "textfield",
      "#title" => "CNY<img src='{$base_img_url}/cn.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Юань Женьміньбі",
      "#value" => "{$cny}",
      "#attributes" => [
        "name" => "cny",
        "id" => "cny_id",
        "style" => "width:420px;"
      ]
    ];
    $form["fieldset"]["inr_input"] = [
      "#type" => "textfield",
      "#title" => "INR<img src='{$base_img_url}/in.gif' alt='' class='currency-flag-icon' />",
      "#description" => "Індійська рупія",
      "#value" => "{$inr}",
      "#attributes" => [
        "name" => "inr",
        "id" => "inr_id",
        "style" => "width:420px;"
      ]
    ];

    // Paragraphs
    $form["date_p"] = [
      "#type" => "html_tag",
      "#tag" => "p",
      "#value" => "<img src='{$base_img_url}/calendar_icon.png' alt='' class='calendar-date-icon' />{$time}"
    ];
    $form["ref_p"] = [
      "#type" => "html_tag",
      "#tag" => "p",
      "#value" => "Джерело: <a href='{$url}'>Європейський центральний банк</a>",
      "#attributes" => [
        "class" => "source-p"
      ]
    ];

    // Buttons
    $form["get_rates_btn"] = [
      "#type" => "submit",
      "#value" => "Оновити",
      "#attributes" => [
        "onclick" => "location.reload()",
        "style" => "margin-right: 12px;"
      ]
    ];
    $form["actions"]["reset_btn"] = [
      "#type" => "submit",
      "#value" => "Скинути",
      "#submit" => ["::reset_form"]
    ];

    return $form;
    // ================================================================================================================
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void
  {
    $this->messenger()->addStatus("Курс валют успішно оновлено");
  }

  public function reset_form(array $form, FormStateInterface $form_state): void
  {
    $build = $form_state->getValue("build");
    $build = false;
  }

  private function convert_helper(string $id, string $currency): string
  {
    return "document.getElementById('{$id}').value=document.getElementById('usd_id').value*{$currency};";
  }
}
