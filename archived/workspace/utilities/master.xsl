<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="head.xsl" />
<xsl:import href="scripts.xsl" />
<xsl:import href="format-date.xsl" />
<xsl:import href="articles.xsl" />




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



        <body>
            <!-- que bueno page needs a special class for the landing page -->
            <xsl:attribute name="class">
                <xsl:value-of select="$current-page" />
                <xsl:if test="$current-page = 'quebueno' and not(/data/quebueno/entry[headline/@handle = /data/params/recipe])"> landing</xsl:if>
            </xsl:attribute>

            <div id="top">
                <header>
                    <div class="container">
                        <a href="/" class="logo">The Front Burner from Chef-mate</a>

                        <button class="menu mobile-only">Menu</button>

                        <nav>
                            <ul>
                                <!-- pages that shouldn't show up in navigation should have the type 'nonav' -->
                                <xsl:apply-templates select="/data/navigation/page[not(types//type = 'nonav')]" />
                            </ul>

                            <!--
                            <a href="/contest/" class="sign-up mobile-only">
                                You could win a trip to the NRA show
                                <span class="button">Sign up</span>
                            </a>
                            -->
                        </nav>

                        <p class="nestle-link">
                            <a href="http://nestleprofessional.com">nestleprofessional.com</a>
                        </p>


                        <!-- search -->
                        <div class="search">
                            <form action="/search/" method="get">
                                <input type="text" name="keywords" placeholder="SEARCH" />

                                <input type="submit" value="Search" />
                            </form>
                        </div>
                    </div>
                </header>



                <div class="main container">
                    <div class="content">
                        <xsl:apply-templates select="/data" />
                    </div>


                    <div class="sidebar">
                        <div class="call-to-action">
                            <a href="/quebueno/">
                                <img src="{$workspace}/img/que-bueno-sidebar.jpg" />
                            </a>
                        </div>


                        <div class="partners">
                            <p class="intro">
                                <xsl:value-of select="/data/partners-intro/entry/sidebar-copy" />
                            </p>

                            <xsl:for-each select="/data/partners/entry">
                                <div class="partner">
                                    <a href="/partners/">
                                        <xsl:if test="small-logo">
                                            <img src="/image/2/0/46/5{small-logo/@path}/{small-logo/filename}" alt="{name}"/>
                                        </xsl:if>
                                        <xsl:if test="not(small-logo)">
                                            <img src="/image/2/0/46/5{large-logo/@path}/{large-logo/filename}" alt="{name}"/>
                                        </xsl:if>
                                    </a>
                                </div>
                            </xsl:for-each>
                        </div>
                    </div>

                    <div class="tablet-only que-bueno">
                        <a href="/quebueno/">
                            <img src="{$workspace}/img/que-bueno-tablet-ad.jpg" />
                        </a>
                    </div>
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

                        <nav>
                            <ul>
                                <xsl:apply-templates select="/data/navigation/page[not(types//type = 'nonav')]" />
                            </ul>
                        </nav>

                        <small>All trademarks and other intellectual properties on this site are owned by Société des Produits Nestlé S.A., Vevey, Switzerland</small>
                    </div>

                    <a href="/" class="chefmate-logo">
                        <img src="{$workspace}/img/chefmate-logo.png" />
                    </a>

                    <a href="http://www.nestleprofessional.com/united-states/en/BrandsAndProducts/Brands/CHEF-MATE/Pages/default.aspx" class="np-logo">
                        <img src="{$workspace}/img/nestle-logo.png" />
                    </a>

                    <div class="mobile-only">
                        <a href="#top" class="back-to-top">
                            Back to Top 
                        </a>

                        <a href="http://nestleprofessional.com">
                            nestleprofessional.com
                        </a>

                        <small>All trademarks and other intellectual properties on this site are owned by Société des Produits Nestlé S.A., Vevey, Switzerland</small>
                    </div>
                </div>
            </footer>



            <!-- welcome text -->
            <div id="lightbox">
                <div class="welcome">
                    <div>
                        <h1>
                            <xsl:copy-of select="/data/welcome-text/entry/headline" />
                        </h1>

                        <div class="welcome-copy">
                            <xsl:copy-of select="/data/welcome-text/entry/copy/*" />

                            <button>Get Started</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- scripts called at the end of page to speed up loading time -->
            <xsl:call-template name="scripts" />

            <p class="print-only">
                <xsl:value-of select="$current-url" />
            </p>
        </body>
    </html>
</xsl:template>




<!-- navigation -->
<xsl:template match="navigation/page">
    <!-- 'talk shop' links to external page, even though internal page exists for sake of navigation -->
    <xsl:variable name="url">
        <xsl:if test="@handle = 'talk-shop'"><xsl:value-of select="/data/talk-shop/entry/copy//a/@href" /></xsl:if>
        <xsl:if test="@handle != 'talk-shop'">/<xsl:value-of select="@handle" />/</xsl:if>
    </xsl:variable>

    <li>
        <xsl:attribute name="class">
            <xsl:value-of select="@handle" /><xsl:if test="$current-page = @handle"> active</xsl:if>
        </xsl:attribute>

        <a href="{$url}">
            <xsl:value-of select="name" />
        </a>

        <xsl:if test="@handle = 'talk-shop'">
            <div class="dropdown">
                <xsl:copy-of select="/data/talk-shop/entry/copy/*" />
            </div>
        </xsl:if>
    </li> 
</xsl:template>
</xsl:stylesheet>
