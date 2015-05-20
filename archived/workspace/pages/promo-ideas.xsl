<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <!-- article list -->
    <xsl:if test="not(promo-ideas/entry[headline/@handle = /data/params/article])">
        <div class="intro">
            <h1>
                <xsl:value-of select="promo-ideas-intro/entry/headline" />
            </h1>

            <xsl:copy-of select="promo-ideas-intro/entry/copy/*" />
        </div>


        <div class="articles">
            <xsl:apply-templates select="promo-ideas/entry" mode="teaser" />
        </div>
    </xsl:if>


    <!-- single article -->
    <xsl:if test="promo-ideas/entry[headline/@handle = /data/params/article]">
        <xsl:apply-templates select="promo-ideas/entry[headline/@handle = /data/params/article]" mode="detail" />
    </xsl:if>
</xsl:template>

</xsl:stylesheet>
