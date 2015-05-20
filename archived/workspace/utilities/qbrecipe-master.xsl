<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="head.xsl" />
<xsl:import href="scripts.xsl" />




<xsl:output method="xml" 
    doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" 
    doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" 
    omit-xml-declaration="yes" 
    indent="yes" />




<xsl:template match="/">
    <xsl:comment><![CDATA[[if lte IE 8]> <html lang="en" class="ie"> <![endif]]]></xsl:comment>
    <xsl:comment><![CDATA[[if gt IE 9]><!]]></xsl:comment> <html lang="en" class="no-js"> <xsl:comment><![CDATA[<![endif]]]></xsl:comment>
        <head>
            <xsl:call-template name="head" />
        </head>



        <body class="qb-unipro-contest {$current-page}">
            <div id="top">
                <header>
                    <div class="container">
                        <a href="/" class="logo">Chef-mate Que Bueno!</a>

                        <nav>
                            <ul>
                                <li>
                                    <xsl:if test="$current-page = 'qbrecipe'">
                                        <xsl:attribute name="class">active</xsl:attribute>
                                    </xsl:if>

                                    <a href="/QBRecipe/">Enter the Contest</a>
                                </li>

                                <!--
                                <li>
                                    <a href="{$workspace}/uploads/que-bueno/pdf/CMQB-FreeCaseOffer-Fillable-PDF.pdf">Bogo Offer</a>
                                </li>
                                -->

                                <li>
                                    <xsl:if test="$current-page = 'rules'">
                                        <xsl:attribute name="class">active</xsl:attribute>
                                    </xsl:if>

                                    <a href="/QBRecipe/rules/">Official Contest Rules</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </header>

                <div class="main container">
                    <div class="content">
                        <section class="hero">
                            <div>
                                <h2>
                                    Introducing queso <br />
                                    <span>that earns even more</span><br />
                                    than your respect
                                </h2>

                                <p>You could win $1500 by<br />entering our recipe contest!</p>

                                <p>
                                    <a href="/qbrecipe/#enter-to-win">Enter Your Recipe</a>
                                </p>
                            </div>
                        </section>

                        <xsl:apply-templates select="/data" />
                    </div> <!-- /content -->
                </div> <!-- /main -->
            </div> <!-- /top -->



            <footer>
                <div class="container">
                    <div class="center">
                        <p class="contact">
                            <span class="call">
                                Call 
                                <span class="phone">1-800-288-8682</span>
                            </span>

                            or

                            <a href="mailto:customerservice@us.nestleprofessional.com?subject=Chef-Mate Front Burner Sales Request" class="request-visit">
                                request a sales visit
                            </a>
                        </p>

                        <ul class="legal">
                            <li>
                                <a href="http://www.nestleprofessional.com/United-States/en/SiteArticles/Pages/PrivacyPolicy.aspx?DCSext.fsf_cta_type=Email&amp;DCSext.fsf_cta_name=mar13NewsletterTxt&amp;WT.mc_ev=emailopen&amp;WT.ac=mar13NewsletterTxt" class="privacy">Privacy Policy</a>
                            </li>

                            <li>
                                <a href="/qbrecipe/rules">Terms &amp; Conditions</a>
                            </li>

                            <li class="truste">
                                <img src="{$workspace}/img/truste.png" />
                            </li>
                        </ul>
                        <nav>
                            <ul>
                                <xsl:apply-templates select="/data/navigation/page[not(types//type = 'nonav')]" />
                            </ul>
                        </nav>

                        <small>All trademarks and other intellectual properties on this site are owned by <br />Société des Produits Nestlé S.A., Vevey, Switzerland or are used with permission.</small>
                    </div>

                    <a href="/" class="chefmate-logo">
                        <img src="{$workspace}/img/chefmate-logo.png" />
                    </a>

                    <a href="http://www.nestleprofessional.com/united-states/en/BrandsAndProducts/Brands/CHEF-MATE/Pages/default.aspx" class="np-logo">
                        <img src="{$workspace}/img/nestle-logo.png" />
                    </a>
                </div>
            </footer>



            <!-- scripts called at the end of page to speed up loading time -->
            <xsl:call-template name="scripts" />

            <p class="print-only">
                <xsl:value-of select="$current-url" />
            </p>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>

