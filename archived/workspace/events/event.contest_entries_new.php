<?php

	require_once(TOOLKIT . '/class.event.php');

	Class eventcontest_entries_new extends SectionEvent{

		public $ROOTELEMENT = 'contest-entries-new';

		public $eParamFILTERS = array(
			'xss-fail'
		);

		public static function about(){
			return array(
				'name' => 'Contest Entries: New',
				'author' => array(
					'name' => 'sugar design studio',
					'website' => 'http://chefmate.dev',
					'email' => 'adam@sugards.com'),
				'version' => 'Symphony 2.3.1',
				'release-date' => '2013-01-24T17:38:33+00:00',
				'trigger-condition' => 'action[contest-entries-new]'
			);
		}

		public static function getSource(){
			return '16';
		}

		public static function allowEditorToParse(){
			return true;
		}

		public static function documentation(){
			return '
        <h3>Success and Failure XML Examples</h3>
        <p>When saved successfully, the following XML will be returned:</p>
        <pre class="XML"><code>&lt;contest-entries-new result="success" type="create | edit">
  &lt;message>Entry [created | edited] successfully.&lt;/message>
&lt;/contest-entries-new></code></pre>
        <p>When an error occurs during saving, due to either missing or invalid fields, the following XML will be returned:</p>
        <pre class="XML"><code>&lt;contest-entries-new result="error">
  &lt;message>Entry encountered errors when saving.&lt;/message>
  &lt;field-name type="invalid | missing" />
  ...
&lt;/contest-entries-new></code></pre>
        <p>The following is an example of what is returned if any options return an error:</p>
        <pre class="XML"><code>&lt;contest-entries-new result="error">
  &lt;message>Entry encountered errors when saving.&lt;/message>
  &lt;filter name="admin-only" status="failed" />
  &lt;filter name="send-email" status="failed">Recipient not found&lt;/filter>
  ...
&lt;/contest-entries-new></code></pre>
        <h3>Example Front-end Form Markup</h3>
        <p>This is an example of the form markup you can use on your frontend:</p>
        <pre class="XML"><code>&lt;form method="post" action="" enctype="multipart/form-data">
  &lt;input name="MAX_FILE_SIZE" type="hidden" value="5242880" />
  &lt;label>First Name
    &lt;input name="fields[first-name]" type="text" />
  &lt;/label>
  &lt;label>Last Name
    &lt;input name="fields[last-name]" type="text" />
  &lt;/label>
  &lt;label>Operation Name
    &lt;input name="fields[operation-name]" type="text" />
  &lt;/label>
  &lt;label>Address 1
    &lt;input name="fields[address-1]" type="text" />
  &lt;/label>
  &lt;label>Address 2
    &lt;input name="fields[address-2]" type="text" />
  &lt;/label>
  &lt;label>Address 3
    &lt;input name="fields[address-3]" type="text" />
  &lt;/label>
  &lt;label>City
    &lt;input name="fields[city]" type="text" />
  &lt;/label>
  &lt;label>State
    &lt;input name="fields[state]" type="text" />
  &lt;/label>
  &lt;label>Zip
    &lt;input name="fields[zip]" type="text" />
  &lt;/label>
  &lt;label>Type of Operation
    &lt;input name="fields[type-of-operation]" type="text" />
  &lt;/label>
  &lt;label>Job Title
    &lt;input name="fields[job-title]" type="text" />
  &lt;/label>
  &lt;label>Email
    &lt;input name="fields[email]" type="text" />
  &lt;/label>
  &lt;label>Phone Number
    &lt;input name="fields[phone-number]" type="text" />
  &lt;/label>
  &lt;label>Primary Buyer/Decision Maker
    &lt;input name="fields[primary-buyer]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Menu Contains Entrees/Chili/Sauces
    &lt;input name="fields[menu-contains]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>From Scratch
    &lt;input name="fields[from-scratch]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Frozen
    &lt;input name="fields[frozen]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Refrigerated
    &lt;input name="fields[refrigerated]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Dry Mix
    &lt;input name="fields[dry-mix]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Canned
    &lt;input name="fields[canned]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Other
    &lt;input name="fields[other]" type="text" />
  &lt;/label>
  &lt;label>Current Purchaser of Entrees/Chili/Sauces
    &lt;input name="fields[current-purchaser]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Cases per Week
    &lt;input name="fields[cases-per-week]" type="text" />
  &lt;/label>
  &lt;label>Meals per Day
    &lt;input name="fields[meals-per-day]" type="text" />
  &lt;/label>
  &lt;label>Primary Distributor
    &lt;input name="fields[primary-distributor]" type="text" />
  &lt;/label>
  &lt;label>Referral
    &lt;input name="fields[referral]" type="text" />
  &lt;/label>
  &lt;label>Follow-up Call
    &lt;input name="fields[follow-up-call]" type="checkbox" value="yes" />
  &lt;/label>
  &lt;label>Best Time
    &lt;input name="fields[best-time]" type="text" />
  &lt;/label>
  &lt;input name="action[contest-entries-new]" type="submit" value="Submit" />
&lt;/form></code></pre>
        <p>To edit an existing entry, include the entry ID value of the entry in the form. This is best as a hidden field like so:</p>
        <pre class="XML"><code>&lt;input name="id" type="hidden" value="23" /></code></pre>
        <p>To redirect to a different location upon a successful save, include the redirect location in the form. This is best as a hidden field like so, where the value is the URL to redirect to:</p>
        <pre class="XML"><code>&lt;input name="redirect" type="hidden" value="http://chefmate.dev/success/" /></code></pre>';
		}

		public function load(){
			if(isset($_POST['action']['contest-entries-new'])) return $this->__trigger();
		}

	}
