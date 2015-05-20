<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




    <xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <xsl:if test="not(quebueno/entry[headline/@handle = /data/params/recipe])">
        <!-- landing page -->
        <section class="intro">
            <div>
                <h1>
                    Que Bueno!
                </h1>

                <p>Introducing queso that earns even more than your respect</p>

                <h2>White Queso Sauce</h2>

                <p>
                    A creamy blend of aged white cheddar, green chiles and jalapeño 
                    peppers offer the flavor and value customers are willing to pay 
                    extra for.
                </p>
            </div>
        </section>


        <ul class="tabs">
            <li>
                <a href="#video">Watch Video</a>
            </li>

            <li>
                <a href="#recipes">See Recipes</a>
            </li>
			<li>
                <a href="/qbrecipe">Recipe Contest</a>
            </li>
        </ul>


        <section class="video" id="video">
            <div class="left">
                <h2>Endless Possibilities Begin Here</h2>

                <img src="{$workspace}/img/quebuenocan.jpg" />

                <p>
                    Discover all of the ways you can add value across the menu with ¡QUE BUENO! White Queso Sauce. 
                </p>

                <p>
                    <a href="/about-us/#cheese-sauces">See all ¡QUE BUENO! sauces</a>
                </p>
            </div>

           <div class="iframe">
               <iframe src="https://player.vimeo.com/video/85978595?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="560" height="315" frameborder="0">	 </iframe>

            </div>
        </section>


        <section class="recipes" id="recipes">
            <h2>
                <span style="position: relative; top: -0.2em;">¡</span>Que Bueno! Recipes
            </h2>

            <xsl:apply-templates select="quebueno/entry" mode="que-bueno" />
        </section>
    </xsl:if>

    <xsl:if test="quebueno/entry[headline/@handle = /data/params/recipe]">
        <!-- individual recipe view -->
        <xsl:apply-templates select="quebueno/entry[headline/@handle = /data/params/recipe]" mode="detail" />
    </xsl:if>
</xsl:template>




<xsl:template match="quebueno/entry" mode="que-bueno">
    <div class="recipe">
        <xsl:attribute name="class">recipe<xsl:if test="position() mod 3 = 1"> first</xsl:if><xsl:if test="position() mod 3 = 0"> third</xsl:if><xsl:if test="position() mod 3 = 2"> second</xsl:if></xsl:attribute>

        <a href="/quebueno/{headline/@handle}/">
            <img src="/image/2/260/150/5{image/@path}/{image/filename}" />
        </a>

        <h3>
            <a href="/quebueno/{headline/@handle}/">
                <xsl:value-of select="headline" />
            </a>
        </h3>

        <p>
            <xsl:value-of select="introduction" />
        </p>

        <!--
        <a href="mailto:?subject=Check out this recipe from Chefmate&amp;body={$root}/quebueno/{headline/@handle}/" class="email">Email</a>

        <a href="{$workspace}{download/@path}/{download/filename}" class="download">Download</a>

        <a href="{recipe-url}" class="recipe-url">See recipe on nestleprofessional.com &gt;</a>
        -->
    </div>

    <xsl:if test="position() mod 3 = 0">
        <hr />
    </xsl:if>
</xsl:template>

</xsl:stylesheet>

