<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <a href="javascript:window.print()" class="print">Print</a>

    <div class="copy">
        <xsl:copy-of select="contest-rules/entry/copy/*" />
    </div>
</xsl:template>

</xsl:stylesheet>