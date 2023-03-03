<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/newsbystasden/templates/page.html.twig */
class __TwigTemplate_9405db4badc5b6e75fc89801e0861c5f extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"fake-body\">
  <div class=\"menu\">
    ";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "menu", [], "any", false, false, true, 3), 3, $this->source), "html", null, true);
        echo "
  </div>

  <div class=\"logo-div\">
    <a href=\"https://newsbystasden.site\">
      <img src=\"https://newsbystasden.site/sites/default/files/logo.png\" alt=\"newsbystasden logo\"
           class=\"logo-img\"/>
    </a>
  </div>

  <hr class=\"default-hr\">

  <div class=\"header\">
    ";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
        echo "
  </div>

  <div class=\"content\">
    ";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
        echo "
  </div>

  <hr class=\"default-hr\">

  <div class=\"footer\">
    ";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
        echo "
  </div>

  <div class=\"footer-brand\">
    <p>newsbystasden.site © 2023 newsbystasden</p>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/newsbystasden/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 26,  66 => 20,  59 => 16,  43 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"fake-body\">
  <div class=\"menu\">
    {{ page.menu }}
  </div>

  <div class=\"logo-div\">
    <a href=\"https://newsbystasden.site\">
      <img src=\"https://newsbystasden.site/sites/default/files/logo.png\" alt=\"newsbystasden logo\"
           class=\"logo-img\"/>
    </a>
  </div>

  <hr class=\"default-hr\">

  <div class=\"header\">
    {{ page.header }}
  </div>

  <div class=\"content\">
    {{ page.content }}
  </div>

  <hr class=\"default-hr\">

  <div class=\"footer\">
    {{ page.footer }}
  </div>

  <div class=\"footer-brand\">
    <p>newsbystasden.site © 2023 newsbystasden</p>
  </div>
</div>
", "themes/custom/newsbystasden/templates/page.html.twig", "/home/u535130821/domains/newsbystasden.site/public_html/themes/custom/newsbystasden/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 3);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
