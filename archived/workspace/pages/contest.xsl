<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <img src="/image/2/660/260/5{contest-intro/entry/header-image/@path}/{contest-intro/entry/header-image/filename}" class="header-image" />

    <div class="intro">
        <h1>
            <xsl:value-of select="contest-intro/entry/headline" />
        </h1>

        <!--
        <a href="#form" class="go-to-form">Go to form</a>
    -->

        <xsl:copy-of select="contest-intro/entry/copy/*" />
    </div>


    <!--
    <div id="form">
        <xsl:if test="events/contest-entries-new[@result != 'success']">
            <p class="error">
                There was an error with your form.
            </p>
        </xsl:if>


        <form action="" method="post">
            <h2>
                Your Contact Information

                <span class="hint">(*required fields)</span>
            </h2>

            <label class="first-name {events/contest-entries-new/first-name/@type}">First Name*:
                <input name="fields[first-name]" type="text" value="{events/contest-entries-new/post-values/first-name}" />
            </label>

            <label class="last-name {events/contest-entries-new/last-name/@type}">Last Name*:
                <input name="fields[last-name]" type="text" value="{events/contest-entries-new/post-values/last-name}"  />
            </label>

            <label class="operation {events/contest-entries-new/operation-name/@type}">Operation Name*:
                <input name="fields[operation-name]" type="text" value="{events/contest-entries-new/post-values/operation-name}"  />
            </label>

            <label class="address-1 {events/contest-entries-new/address-1/@type}">Address*:
                <input name="fields[address-1]" type="text" value="{events/contest-entries-new/post-values/address-1}"  />
            </label>

            <input name="fields[address-2]" type="text" class="address-2 {events/contest-entries-new/address-2/@type}" value="{events/contest-entries-new/post-values/address-2}" />

            <input name="fields[address-3]" type="text" class="address-3 {events/contest-entries-new/address-3/@type}" value="{events/contest-entries-new/post-values/address-3}" />

            <label class="city {events/contest-entries-new/city/@type}">City*:
                <input name="fields[city]" type="text" value="{events/contest-entries-new/post-values/city}"  />
            </label>

            <label class="state {events/contest-entries-new/state/@type}">State*:
                <input name="fields[state]" type="text" value="{events/contest-entries-new/post-values/state}"  />
            </label>

            <label class="zip {events/contest-entries-new/zip/@type}">Zip*:
                <input name="fields[zip]" type="text" value="{events/contest-entries-new/post-values/zip}"  />
            </label>

            <label class="operation-type {events/contest-entries-new/type-of-operation/@type}">Type of Operation*:
                <input name="fields[type-of-operation]" type="text" value="{events/contest-entries-new/post-values/type-of-operation}"  />
            </label>

            <label class="title {events/contest-entries-new/job-title/@type}">Job Title*:
                <input name="fields[job-title]" type="text" value="{events/contest-entries-new/post-values/job-title}"  />
            </label>

            <label class="email {events/contest-entries-new/email/@type}">Email**:
                <input name="fields[email]" type="text" value="{events/contest-entries-new/post-values/email}"  />
            </label>

            <label class="phone {events/contest-entries-new/phone-number/@type}">Phone Number*:
                <input name="fields[phone-number]" type="text" value="{events/contest-entries-new/post-values/phone-number}"  />
            </label>

            <div class="primary-buyer">
                <p>Are you the primary buyer or purchase decision-maker for your foodservice operation?</p>

                <label>
                    <input name="fields[primary-buyer]" type="radio" value="yes"> 
                        <xsl:if test="events/contest-entries-new/post-values/primary-buyer = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Yes
                </label>

                <label>
                    <input name="fields[primary-buyer]" type="radio" value="no">
                        <xsl:if test="events/contest-entries-new/post-values/primary-buyer = 'no'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    No
                </label>
            </div>

            <div class="menu-contains">
                <p>Do you currently have entreès, chili or cheese sauces to your menu?</p>

                <label>
                    <input name="fields[menu-contains]" type="radio" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/menu-contains = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Yes
                </label>

                <label>
                    <input name="fields[menu-contains]" type="radio" value="no">
                        <xsl:if test="events/contest-entries-new/post-values/menu-contains = 'no'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    No
                </label>
            </div>

            <div class="ingredient-types">
                <p>What kind of entreès, chili or cheese sauces do you prepare?  (check all that apply)</p>

                <label>
                    <input name="fields[from-scratch]" type="checkbox" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/from-scratch = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    From Scratch
                </label>

                <label>
                    <input name="fields[frozen]" type="checkbox" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/frozen = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Frozen
                </label>

                <label>
                    <input name="fields[refrigerated]" type="checkbox" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/refrigerated = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Refrigerated
                </label>

                <label>
                    <input name="fields[dry-mix]" type="checkbox" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/dry-mix = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Dry Mix
                </label>

                <label>
                    <input name="fields[canned]" type="checkbox" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/canned = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Canned
                </label>

                <label>
                    <input name="fields[from-scratch]" type="checkbox" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/from-scratch = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    From Scratch
                </label>

                <label>
                    <input type="checkbox" /> Other (please specify)
                </label>

                <input name="fields[other]" type="text" value="{events/contest-entries-new/post-values/other}" class="other" />
            </div>

            <div class="current-purchaser">
                <p>Are you currently purchasing a canned entreè, chili or cheese sauce?*</p>

                <label>
                    <input name="fields[current-purchaser]" type="radio" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/current-purchaser = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Yes
                </label>

                <label>
                    <input name="fields[current-purchaser]" type="radio" value="no">
                        <xsl:if test="events/contest-entries-new/post-values/current-purchaser = 'no'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    No
                </label>
            </div>

            <label class="cases-per-week">If yes, how many cases per week?
                <input name="fields[cases-per-week]" type="text" value="{events/contest-entries-new/post-values/cases-per-week}" />
            </label>

            <div class="current-purchaser-chefmate {events/contest-entries-new/last-name/@type}">
                <p>Are you currently using a CHEF-MATE<sub>®</sub> entreè, chili or cheese sauce?*</p>

                <label>
                    <input name="fields[current-purchaser-chefmate]" type="radio" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/current-purchaser-chefmate = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Yes
                </label>

                <label>
                    <input name="fields[current-purchaser-chefmate]" type="radio" value="no">
                        <xsl:if test="events/contest-entries-new/post-values/current-purchaser-chefmate = 'no'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    No
                </label>
            </div>

            <label class="cases-per-week-chefmate">If yes, how many cases per week?
                <input name="fields[cases-per-week-chefmate]" type="text" value="{events/contest-entries-new/post-values/cases-per-week-chefmate}" />
            </label>

            <label class="meals-per-day">How many meals does your operation serve per day?
                <input name="fields[meals-per-day]" type="text" value="{events/contest-entries-new/post-values/meals-per-day}" />
            </label>

            <label>Who is your primary distributor?
                <input name="fields[primary-distributor]" type="text" value="{events/contest-entries-new/post-values/primary-distributor}" />
            </label>

            <label>How did you hear about the Too Good To Be True Sweepstakes?
                <input name="fields[referral]" type="text" value="{events/contest-entries-new/post-values/referral}" />
            </label>

            <div class="follow-up-call {events/contest-entries-new/last-name/@type}">
                <p>Would you like a follow-up call from a NESTLÉ PROFESSIONAL sales representative?*</p>

                <label>
                    <input name="fields[follow-up-call]" type="radio" value="yes">
                        <xsl:if test="events/contest-entries-new/post-values/follow-up-call = 'yes'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    Yes
                </label>

                <label>
                    <input name="fields[follow-up-call]" type="radio" value="no">
                        <xsl:if test="events/contest-entries-new/post-values/follow-up-call = 'no'">
                            <xsl:attribute name="checked">checked</xsl:attribute>
                        </xsl:if>
                    </input>
                    No
                </label>
            </div>

            <label class="best-time">If yes, best time/day?
                <input name="fields[best-time]" type="text" value="{events/contest-entries-new/post-values/best-time}" />
            </label>


            <label class="agree-to-terms">
                <input type="checkbox" name="fields[agreed-to-terms]" />
                I have read and agree to the <a href="/rules/">rules</a> of this contest.
            </label>

            <xsl:if test="events/contest-entries-new/agreed-to-terms/@type = 'missing'">
                <p class="error">
                    * You must agree to the rules of this contest to submit an entry
                </p>
            </xsl:if>

            <div class="privacy">
                <xsl:copy-of select="privacy-statement/entry/copy/*" />
            </div>

            <input type="hidden" name="redirect" value="/contest/success/#thank-you" />

            <xsl:if test="not(params/success = 'success')">
                <input type="submit" name="action[contest-entries-new]" value="Enter Competition" />
            </xsl:if>
        </form>


        <xsl:if test="params/success = 'success'">
            <div class="thank-you">
                <button>Close</button>
                
                <p class="success">
                    Thank you for entering the Too Good to be True Getaway Sweepstakes.  Your submission has been received.
                </p>
            </div>
        </xsl:if>
    </div>
    -->
</xsl:template>

</xsl:stylesheet>
