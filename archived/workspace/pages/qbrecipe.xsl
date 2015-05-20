<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="../utilities/qbrecipe-master.xsl" />


<xsl:template match="/data">
    <section class="intro">
        <div class="copy">
            <h2>
                <span>Chef-Mate ¡Que Bueno!<sup>&#174;</sup> </span>
                White queso sauce
            </h2>

            <h2 class="earn-more">Earn more with the chance to win $1500.</h2>

            <p>
                Enter the ¡Que Bueno! White Queso Sauce Recipe Contest.<br />
                Share a dish you think deserves fame and fortune, and you <br />
                could win just that—$1500 and your recipe featured<br />
                on the <em>Chef-Mate</em> website! 
            </p>

            <div class="calls-to-action">
                <p>
                    
                </p>

                <p class="more-info">
                    For more information about ¡Que Bueno! products, or for recipe 
                    inspiration, visit <a href="/">chefmatefrontburner.com</a>.
                </p>
            </div>
        </div>

        <img src="{$workspace}/img/quebuenocan2.jpg" />
    </section>


    <section class="how-it-works">
        <h2>How the contest works</h2>

        <h3>Prizes</h3>
        <p>
            Top four finalists will receive three free cases of <em>Chef-Mate</em><sup>&#174;</sup> products. Grand Prize Winner will receive a $1500 Prepaid Gift Card prize and winning recipe will be photographed and featured on chefmatefrontburner.com/Quebueno.</p>
<p>
<a href="/qbrecipe/rules/"><u>See official rules</u></a>.</p>
        

        <h3>1. To Enter</h3>
        <p>
            Submit your original recipe featuring ¡Que Bueno! White Queso Sauce by filling out the contest entry form below or through your sales representative from May 30 through November 30, 2014. Open to UniPro customers only.
        </p>

        <h3>2. Judging</h3>
        <p>
            Our Nestlé Professional<sup>&#174;</sup> panel will select four finalists from all valid entries based on the following criteria:  <br />
Taste 50%, Creativity 25% and Accuracy 25%.
        </p>

        <h3>3. Voting Phase</h3>
        <p>The four finalists’ recipes will be prepared by our panel of chefs for tasting. The winning recipe will be selected by our panel of chefs and culinary professionals. The winner will be notified via email on or around February 2, 2015.</p>
    </section>


    <section class="form" id="enter-to-win">
        <h2>Contest Entry</h2>

        <a href="{$workspace}/uploads/que-bueno/Chef-Mate-Que-Bueno-Recipe-Contest-Template.doc" class="template">
            Feel free to use our <span>recipe template</span>.
        </a>


        <div class="wufoo-form">
            <div id="wufoo-z1jzqlzd1iwppt6">
            </div>
            <script type="text/javascript">var z1jzqlzd1iwppt6;(function(d, t) {
                var s = d.createElement(t), options = {
                'userName':'stouffersrisotto',
                'formHash':'z1jzqlzd1iwppt6',
                'autoResize':true,
                'height':'993',
                'async':true,
                'host':'wufoo.com',
                'header':'show',
                'ssl':true};
                s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'wufoo.com/scripts/embed/form.js';
                s.onload = s.onreadystatechange = function() {
                var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
                try { z1jzqlzd1iwppt6 = new WufooForm();z1jzqlzd1iwppt6.initialize(options);z1jzqlzd1iwppt6.display(); } catch (e) {}};
                var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
                })(document, 'script');</script>
        </div>

        <p>
            Your privacy is important to Nestlé Professional. We do not sell or rent your email address or any other personal identifiable information to third-party companies. Learn more about our <a href="http://www.nestleprofessional.com/United-States/en/SiteArticles/Pages/PrivacyPolicy.aspx?DCSext.fsf_cta_type=Email&amp;DCSext.fsf_cta_name=mar13NewsletterTxt&amp;WT.mc_ev=emailopen&amp;WT.ac=mar13NewsletterTxt" class="privacy">Privacy Policy</a>. 
        </p>
    </section>


    <section class="rules">
        <p>
            <a href="/QBRecipe/rules/#rules"><em>Chef-Mate</em>® <em>¡Que Bueno!</em> Recipe Full Official Contest Rules</a>
        </p>

        <small>
            Nestlé Professional<sup>&#174;</sup> is conducting a Recipe Contest open only to foodservice operators purchasing <em>Chef-Mate ¡Que Bueno!</em> White Queso sauce from members of UniPro Foodservice. 
            One mandatory ingredient of this recipe must be <em>Chef-Mate ¡Que Bueno!</em> White Queso Sauce. Limit one entry per operator.
        </small>
    </section>
</xsl:template>
</xsl:stylesheet>
