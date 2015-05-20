<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">



<xsl:template name="navigation">
    <li>
        <xsl:attribute name="class">
            <xsl:value-of select="@handle" /><xsl:if test="$current-page = @handle"> active</xsl:if>
        </xsl:attribute>
        <a href="/{@handle}/">
            <xsl:value-of select="name" />
        </a>
    </li> 
</xsl:template>
</xsl:stylesheet>

