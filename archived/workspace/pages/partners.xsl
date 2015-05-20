<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <div class="intro">
        <h1>
            <xsl:value-of select="partners-intro/entry/headline" />
        </h1>

        <xsl:copy-of select="partners-intro/entry/copy/*" />
    </div>


    <div class="logos">
        <xsl:for-each select="partners/entry">
            <div class="partner">
                <a href="{url}">
                    <img src="/image/2/190/0/5{large-logo/@path}/{large-logo/filename}" alt="{name}" />
                </a>
            </div>
        </xsl:for-each>
    </div>
</xsl:template>
</xsl:stylesheet>
