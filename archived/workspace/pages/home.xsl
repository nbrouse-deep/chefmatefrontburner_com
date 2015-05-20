<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <div class="menu-ideas">
        <xsl:apply-templates select="menu-ideas/entry[1]" mode="teaser">
            <xsl:with-param name="link-to-all" select="'yes'" />
        </xsl:apply-templates>
    </div>


    <div class="promo-ideas">
        <xsl:apply-templates select="promo-ideas/entry[1]" mode="teaser">
            <xsl:with-param name="link-to-all" select="'yes'" />
        </xsl:apply-templates>
    </div>


    <div class="business-tips">
        <xsl:apply-templates select="business-tips/entry[1]" mode="teaser">
            <xsl:with-param name="link-to-all" select="'yes'" />
        </xsl:apply-templates>
    </div>
</xsl:template>

</xsl:stylesheet>
