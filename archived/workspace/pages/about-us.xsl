<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <img src="/image/2/660/260/5{about-us-intro/entry/header-image/@path}/{about-us-intro/entry/header-image/filename}" class="header-image" />

    <div class="intro">
        <h1>
            <xsl:value-of select="about-us-intro/entry/headline" />
        </h1>

        <xsl:copy-of select="about-us-intro/entry/copy/*" />
    </div>


    <div class="categories">
        <xsl:apply-templates select="product-categories/entry" />
    </div>


    <!--
        <a href="#" class="faqs">Frequently Asked Questions</a>
    -->
</xsl:template>



<!-- categories -->
<xsl:template match="product-categories/entry">
    <div id="{name/@handle}" class="category">
        <h2>
            <a href="#{name/@handle}">
                <xsl:value-of select="name" />
            </a>
        </h2>

        <xsl:if test="name/@handle = 'cheese-sauces'">
            <div class="que-bueno">
                <img src="{$workspace}/img/que-bueno-can.jpg" />

                <h3>New ¡QUE BUENO!<sup>&#169;</sup> White Queso Sauce</h3>

                <p>
                    A creamy blend of aged white cheddar, green chiles and 
                    jalapeño peppers offer the flavor and value customers are 
                    willing to pay extra for.
                </p>

                <a href="/quebueno/">Learn More</a>
            </div>
        </xsl:if>

        <div class="products clearfix">
            <xsl:apply-templates select="/data/products/category[@link-id = current()/@id]/entry" />
        </div>
    </div>
</xsl:template>



<!-- products by category -->
<xsl:template match="products/category/entry">
    <div id="{name/@handle}" class="product">
        <img src="/image/2/65/0/5{image/@path}/{image/filename}" />

        <div class="right">
            <h3>
                <a href="#">
                    <xsl:value-of select="display-line-1" />

                    <xsl:text> </xsl:text>
                    
                    <br />

                    <xsl:value-of select="display-line-2" />
                </a>
            </h3>

            <button class="show-more">Show More</button>
        </div>

        <div class="more-info">
            <div class="product-info">
                <div>
                    <button>Close</button>

                    <img src="/image/2/130/0/5{image/@path}/{image/filename}" />

                    <div class="right">
                        <h4>
                            <xsl:value-of select="display-line-1" />

                            <!-- need a forced space for mobile where this heading isn't two lines -->
                            <br />
                            
                            <xsl:value-of select="display-line-2" />
                        </h4>

                        <p>
                            <xsl:value-of select="description" />

                            &#160;
                            <a href="{url}">Learn More</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</xsl:template>

</xsl:stylesheet>
