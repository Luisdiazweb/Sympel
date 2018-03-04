<?php

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */

$this->title = "Privacy Policy - Sympel";

$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile("@web/app-assets/js/scripts/forms/checkbox-radio.js",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);


?>


    <section id="validation mt-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="">
                    <div class="card-body collapse in mt-3">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <h3 class="section-title my-3 text-xs-center">Legal Stuff </h3>
                                    <!--END OF CHECKBOX AREA-->
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
		<ul class="nav nav-tabs nav-iconfall flex">
			<li class="nav-item">
			<a class="nav-link active" id="baseIcon-tab41" data-toggle="tab" aria-controls="tabIcon41" href="#tabIcon41" aria-expanded="true"><i class="fa fa-check"></i> Privacy Policy</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="baseIcon-tab42" data-toggle="tab" aria-controls="tabIcon42" href="#tabIcon42" aria-expanded="false"><i class="fa fa-check"></i> Terms of Use</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="baseIcon-tab43" data-toggle="tab" aria-controls="tabIcon43" href="#tabIcon43" aria-expanded="false"><i class="fa fa-check"></i> Posting Rules</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="baseIcon-tab43" data-toggle="tab" aria-controls="tabIcon44" href="#tabIcon44" aria-expanded="false"><i class="fa fa-check"></i> Community Guidelines</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="baseIcon-tab43" data-toggle="tab" aria-controls="tabIcon45" href="#tabIcon45" aria-expanded="false"><i class="fa fa-check"></i> Prohibited Items</a>
			</li>
		</ul>
		<div class="tab-content px-1 pt-1">
			<hr>
			<div role="tabpanel" class="tab-pane active" id="tabIcon41" aria-expanded="true" aria-labelledby="baseIcon-tab41">
				<div class="card-body collapse in">
                	<div class="card-block">
	                    <div class="row">
	                        <div class="col-md-8 offset-md-2">
	                            <h3 class="section-title my-3 text-xs-center">Privacy Policy</h3>
	                             <p class="text-sm-center my-3">This policy details how data about you is used when you access our websites and services (together,"sympel") or interact with us.</p>
	                            <!--END OF CHECKBOX AREA-->
	                        </div>
	                    </div>
                   </div>
                </div>
                <div class="container">
					<div class="col-md-12">
						<h3 class="section-title mt-1 mb-1">Protecting Your Privacy</h3>
						<ul>
							<li>We take precautions to prevent unauthorized access to or misuse of data about you.</li>
							<li>We do not run ads.</li>
							<li>We do not share your data with third parties for marketing purposes.</li>
							<li>We do not engage in cross-marketing or link-referral programs.</li>
							<li>We do not employ tracking devices for marketing purposes.</li>
							<li>We do not send you unsolicited communications for marketing purposes.</li>
							<li>We do not engage in affiliate marketing (and prohibit it on sympel).</li>
							<li>We do provide email proxy & relay services to reduce unwanted email.</li>
							<li>Please review privacy policies of any third party sites linked to from sympel.</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Data We Use </h3>
						<ul>
							<li>Data you post on or send via sympel, and/or send us directly or via other sites.</li>
							<li>Data you submit or provide (e.g. name, address, email, phone, photos, tax ID).</li>
							<li>Web log data (e.g. web pages viewed, access times, IP address, HTTP headers).</li>
							<li>Data collected via cookies (e.g. search data and "favorites" lists).</li>
							<li>Data about your device(s) (e.g. screen size, DOM local storage, plugins).</li>
							<li>Data from 3rd parties (e.g. phone type, geo-location via IP address).</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Data We Store </h3>
						<ul>
							<li>We retain data as needed for our business purposes and/or as required by law.</li>
							<li>We make good faith efforts to store data securely, but can make no guarantees.</li>
							<li>You may access and update certain data about you via your account login.</li>
						</ul>
					</div>
					<div class="col-md-12 mb-3">
						<h3 class="section-title mt-3 mb-1">Circumstances Which We May Disclose User Data </h3>
						<ul>
							<li>To vendors and service providers working on our behalf.</li>
							<li>To respond to subpoenas, search warrants, court orders, or other legal process.</li>
							<li>To protect our rights, property, or safety, or that of users of sympel or the general public.</li>
							<li>With your consent (e.g. if you authorize us to share data with other users).</li>
							<li>In connection with a merger, bankruptcy, or sale/transfer of assets.</li>
							<li>In aggregate/summary form, where it cannot reasonably be used to identify you.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="tabIcon42" aria-labelledby="baseIcon-tab42">
			    <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <h3 class="section-title my-3 text-xs-center">Terms of Use </h3>
                                <!--END OF CHECKBOX AREA-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
					<div class="col-md-12">
						<h3 class="section-title mt-1 mb-1">1. Acceptance Of Terms </h3>
						<p>Sympel provides a collection of online resources, including classified postings and user offered donations, (referred to hereafter as "the Service") subject to the following Terms of Use ("TOU"). By using the Service in any way, you are agreeing to comply with the TOU. In addition, when using particular sympel services, you agree to abide by any applicable posted guidelines for all sympel services, which may change from time to time.
						</p>
						<p>Should you object to any term or condition of the TOU, any guidelines, or any subsequent modifications thereto or become dissatisfied with sympel in any way, your only recourse is to immediately discontinue use of sympel. sympel has the right, but is not obligated, to strictly enforce the TOU through self-help, community moderation, active investigation, litigation and prosecution.</p>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">2. Modifications To This Agreement </h3>
						<p>We reserve the right, at our sole discretion, to change, modify or otherwise alter these terms and conditions at any time. Such modifications shall become effective immediately upon the posting thereof. You must review this agreement on a regular basis to keep yourself apprised of any changes.</p> 
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">3. Content </h3>
						<p>You understand that all postings, messages, text, files, images, photos, video, sounds, or other materials ("Content") posted on, transmitted through, or linked from the Service, are the sole responsibility of the person from whom such Content originated. More specifically, you are entirely responsible for each individual item ("Item") of Content that you post, email or otherwise make available via the Service. You understand that sympel does not control, and is not responsible for Content made available through the Service, and that by using the Service, you may be exposed to Content that is offensive, indecent, inaccurate, misleading, or otherwise objectionable. Furthermore, the sympel site and Content available through the Service may contain links to other websites, which are completely independent of sympel. sympel makes no representation or warranty as to the accuracy, completeness or authenticity of the information contained in any such site. Your linking to any other websites is at your own risk. You agree that you must evaluate, and bear all risks associated with, the use of any Content, that you may not rely on said Content, and that under no circumstances will sympel be liable in any way for any Content or for any loss or damage of any kind incurred as a result of the use of any Content posted, emailed or otherwise made available via the Service. You acknowledge that sympel does not pre-screen or approve Content, but that sympel shall have the right (but not the obligation) in its sole discretion to refuse, delete or move any Content that is available via the Service, for violating the letter or spirit of the TOU or for any other reason.dae! Ratione voluptatum molestiae adipisci, beatae obcaecati. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">4. Third Party Content, Sites, And Services </h3>
						<p>The sympel site and Content available through the Service may contain features and functionalities that may link you or provide you with access to third party content which is completely independent of sympel, including web sites, directories, servers, networks, systems, information and databases, applications, software, programs, products or services, and the Internet as a whole.</p>
						<p>Your interactions with organizations and/or individuals found on or through the Service, including payment and delivery of goods or services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between you and such organizations and/or individuals. You should make whatever investigation you feel necessary or appropriate before proceeding with any online or offline transaction with any of these third parties.</p>
						<p>You agree that sympel shall not be responsible or liable for any loss or damage of any sort incurred as the result of any such dealings. If there is a dispute between participants on this site, or between users and any third party, you understand and agree that sympel is under no obligation to become involved. In the event that you have a dispute with one or more other users, you hereby release sympel, its officers, employees, agents and successors in rights from claims, demands and damages (actual and consequential) of every kind or nature, known or unknown, suspected and unsuspected, disclosed and undisclosed, arising out of or in any way related to such disputes and / or our service. If you are a California resident, you waive California Civil Code Section 1542, which says: "A general release does not extend to claims which the creditor does not know or suspect to exist in his favor at the time of executing the release, which, if known by him must have materially affected his settlement with the debtor."</p>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">5. Privacy And Information Disclosure </h3>
						<p>sympel has established a Privacy Policy to explain to users how their information is collected and used, which is located at the following web address: <a href="#">http://sympel.com</a></p>
						<p>Your use of the sympel website or the Service signifies acknowledgement of and agreement to our Privacy Policy. You further acknowledge and agree that sympel may, in its sole discretion, preserve or disclose your Content, as well as your information, such as email addresses, IP addresses, timestamps, and other user information, if required to do so by law or in the good faith belief that such preservation or disclosure is reasonably necessary to: comply with legal process; enforce the TOU; respond to claims that any Content violates the rights of third-parties; respond to claims that contact information (e.g. phone number, street address) of a third-party has been posted or transmitted without their consent or as a form of harassment; protect the rights, property, or personal safety of sympel, its users or the general public.</p>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">6. Conduct </h3>
						<p>You agree not to post, email, or otherwise make available Content:</p>
						<p>a) that is unlawful, harmful, threatening, abusive, harassing, defamatory, libelous, invasive of another's privacy, or is harmful to minors in any way;</p>
						<p>b) that is pornographic or depicts a human being engaged in actual sexual conduct including but not limited to (i) sexual intercourse, including genital-genital, oral-genital, anal-genital, or oral-anal, whether between persons of the same or opposite sex, or (ii) bestiality, or (iii) masturbation, or (iv) sadistic or masochistic abuse, or (v) lascivious exhibition of the genitals or pubic area of any person;</p>
						<p>c) that harasses, degrades, intimidates or is hateful toward an individual or group of individuals on the basis of religion, gender, sexual orientation, race, ethnicity, age, or disability;</p>
						<p>d) that impersonates any person or entity, including, but not limited to, a sympel employee, or falsely states or otherwise misrepresents your affiliation with a person or entity (this provision does not apply to Content that constitutes lawful non-deceptive parody of public figures.);</p>
						<p>e) that includes personal or identifying information about anotherperson without that person's explicit consent;</p>
						<p>f) that is false, deceptive, misleading, deceitful, misinformative, or constitutes "bait and switch";</p>
						<p>g) that infringes any patent, trademark, trade secret, copyright or other proprietary rights of any party, or Content that you do not have a right to make available under any law or under contractual or fiduciary relationships;</p>
						<p>h) that constitutes or contains "affiliate marketing," "link referral code," "junk mail," "spam," "chain letters," "pyramid schemes", or unsolicited commercial advertisement;</p>
						<p>i) that constitutes or contains any form of advertising or solicitation if: posted in areas of the sympel sites which are not designated for such purposes; or emailed to sympel users who have not indicated in writing that it is ok to contact them about other services, products or commercial interests.</p>
						<p>j) that includes links to commercial services or web sites, except as allowed in "services";</p>
						<p>k) that advertises any service or the sale of any items. The sale of items through the sympel Service is prohibited;</p>
						<p>l) that contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment;</p>
						<p>m) that disrupts the normal flow of dialogue with an excessive amount of Content (flooding attack) to the Service, or that otherwise negatively affects other user's ability to use the Service; or</p>
						<p>n) that employs misleading email addresses, or forged headers or otherwise manipulated identifiers in order to disguise the origin of Content transmitted through the Service.</p>
						<p>Additionally, you agree not to:</p>
						<p>o) contact anyone who has asked not to be contacted, or make unsolicited contact with anyone for any commercial purpose;</p>
						<p>p) "stalk" or otherwise harass anyone;</p>
						<p>q) collect personal data about other users for commercial or unlawful purposes;</p>
						<p>r) use automated means, including spiders, robots, crawlers, data mining tools, or the like to download data from the Service - unless expressly permitted by sympel;</p>
						<p>s) post non-local or otherwise irrelevant Content, repeatedly post the same or similar Content or otherwise impose an unreasonable or disproportionately large load on our infrastructure;</p>
						<p>t) post the same item or service in more than one classified category or forum, or in more than one metropolitan area;</p>
						<p>u) attempt to gain unauthorized access to sympel's computer systems or engage in any activity that disrupts, diminishes the quality of, interferes with the performance of, or impairs the functionality of, the Service or the sympel website; or</p>
						<p>v) use any form of automated device or computer program that enables the submission of postings on sympel without each posting being manually entered by the author thereof (an "automated posting device"), including without limitation, the use of any such automated posting device to submit postings in bulk, or for automatic submission of postings at regular intervals.</p>
						<p>z) use any form of automated device or computer program ("flagging tool")that enables the use of sympel's "flagging system" or other community moderation systems without each flag being manually entered by the person that initiates the flag (an "automated flagging device"), or use the flagging tool to remove posts of competitors, or to remove posts without a good faith belief that the post being flagged violates these TOU;</p>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">7. Posting Agents</h3>
						<p>A "Posting Agent" is a third-party agent, service, or intermediary that offers to post Content to the Service on behalf of others. To moderate demands on sympel's resources, you may not use a Posting Agent to post Content to the Service without express permission or license from sympel. Correspondingly, Posting Agents are not permitted to post Content on behalf of others, to cause Content to be so posted, or otherwise access the Service to facilitate posting Content on behalf of others, except with express permission or license from sympel.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">8. No Spam Policy</h3>
						<p>You understand and agree that sending unsolicited email advertisements to sympel email addresses or through sympel computer systems, which is expressly prohibited by these Terms. Any unauthorized use of sympel computer systems is a violation of these Terms and certain federal and state laws, including without limitation the Computer Fraud and Abuse Act. Such violations may subject the sender and his or her agents to civil and criminal penalties.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">10. Limitations On Service</h3>
						<p>You acknowledge that sympel may establish limits concerning use of the Service, including the maximum number of days that Content will be retained by the Service, the maximum number and size of postings, email messages, or other Content that may be transmitted or stored by the Service, and the frequency with which you may access the Service. You agree that sympel has no responsibility or liability for the deletion or failure to store any Content maintained or transmitted by the Service. You acknowledge that sympel reserves the right at any time to modify or discontinue the Service (or any part thereof) with or without notice, and that sympel shall not be liable to you or to any third party for any modification, suspension or discontinuance of the Service.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">11. Access To The Service</h3>
						<p>sympel grants you a limited, revocable, nonexclusive license to access the Service for your own personal use. This license does not include: (a) access to the Service by Posting Agents; or (b) any collection, aggregation, copying, duplication, display or derivative use of the Service nor any use of data mining, robots, spiders, or similar data gathering and extraction tools for any purpose unless expressly permitted by sympel. A limited exception to (b) is provided to general purpose internet search engines and non-commercial public archives that use such tools to gather information for the sole purpose of displaying hyperlinks to the Service, provided they each do so from a stable IP address or range of IP addresses using an easily identifiable agent and comply with our robots.txt file. "General purpose internet search engine" does not include a website or search engine or other service that specializes in classified listings or in any subset of classifieds listings such as jobs, housing, for sale, services, or personals, or which is in the business of providing classified ad listing services.</p>

						<p>sympel permits you to display on your website, or create a hyperlink on your website to, individual postings on the Service so long as such use is for noncommercial and/or news reporting purposes only (e.g., for use in personal web blogs or personal online media). If the total number of such postings displayed or linked to on your website exceeds one hundred (100) postings, your use will be presumed to be in violation of the TOU, absent express permission granted by sympel to do so. You may also create a hyperlink to the home page of sympel sites so long as the link does not portray sympel, its employees, or its affiliates in a false, misleading, derogatory, or otherwise offensive matter.</p>

						<p>Use of the Service beyond the scope of authorized access granted to you by sympel immediately terminates said permission or license. In order to collect, aggregate, copy, duplicate, display or make derivative use of the the Service or any Content made available via the Service for other purposes (including commercial purposes) not stated herein, you must first obtain a license from sympel.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">12. Termination Of Service</h3>
						<p>You agree that sympel, in its sole discretion, has the right (but not the obligation) to delete or deactivate your account, block your email or IP address, or otherwise terminate your access to or use of the Service (or any part thereof), immediately and without notice, and remove and discard any Content within the Service, for any reason, including, without limitation, if sympel believes that you have acted inconsistently with the letter or spirit of the TOU. Further, you agree that sympel shall not be liable to you or any third-party for any termination of your access to the Service. Further, you agree not to attempt to use the Service after said termination. Sections 2, 4, 6 and 9-15 shall survive termination of the TOU.</p>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">13. Proprietary Rights</h3>
						<p>The Service is protected to the maximum extent permitted by copyright laws and international treaties. Content displayed on or through the Service is protected by copyright as a collective work and/or compilation, pursuant to copyrights laws, and international conventions. Any reproduction, modification, creation of derivative works from or redistribution of the site or the collective work, and/or copying or reproducing the sites or any portion thereof to any other server or location for further reproduction or redistribution is prohibited without the express written consent of sympel. You further agree not to reproduce, duplicate or copy Content from the Service without the express written consent of sympel, and agree to abide by any and all copyright notices displayed on the Service. You may not decompile or disassemble, reverse engineer or otherwise attempt to discover any source code contained in the Service. Without limiting the foregoing, you agree not to reproduce, duplicate, copy, sell, resell or exploit for any commercial purposes, any aspect of the Service. SYMPEL is a registered mark in the U.S. Patent and Trademark Office.</p>
						<p>Although sympel does not claim ownership of content that its users post, by posting Content to any public area of the Service, you automatically grant, and you represent and warrant that you have the right to grant, to sympel an irrevocable, perpetual, non-exclusive, fully paid, worldwide license to use, copy, perform, display, and distribute said Content and to prepare derivative works of, or incorporate into other works, said Content, and to grant and authorize sublicenses (through multiple tiers) of the foregoing. Furthermore, by posting Content to any public area of the Service, you automatically grant sympel all rights necessary to prohibit any subsequent aggregation, display, copying, duplication, reproduction, or exploitation of the Content on the Service by any party for any purpose.</p>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">14. Disclaimer Of Warranties</h3>
						<p>YOU AGREE THAT USE OF THE SYMPEL SITE AND THE SERVICE IS ENTIRELY AT YOUR OWN RISK. THE SYMPEL SITE AND THE SERVICE ARE PROVIDED ON AN "AS IS" OR "AS AVAILABLE" BASIS, WITHOUT ANY WARRANTIES OF ANY KIND. ALL EXPRESS AND IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT OF PROPRIETARY RIGHTS ARE EXPRESSLY DISCLAIMED TO THE FULLEST EXTENT PERMITTED BY LAW. TO THE FULLEST EXTENT PERMITTED BY LAW, SYMPEL DISCLAIMS ANY WARRANTIES FOR THE SECURITY, RELIABILITY, TIMELINESS, ACCURACY, AND PERFORMANCE OF THE SYMPEL SITE AND THE SERVICE. TO THE FULLEST EXTENT PERMITTED BY LAW, SYMPEL DISCLAIMS ANY WARRANTIES FOR OTHER SERVICES OR GOODS RECEIVED THROUGH OR ADVERTISED ON THE SYMPEL SITE OR THE SITES OR SERVICE, OR ACCESSED THROUGH ANY LINKS ON THE SYMPEL SITE. TO THE FULLEST EXTENT PERMITTED BY LAW, SYMPEL DISCLAIMS ANY WARRANTIES FOR VIRUSES OR OTHER HARMFUL COMPONENTS IN CONNECTION WITH THE SYMPEL SITE OR THE SERVICE. Some jurisdictions do not allow the disclaimer of implied warranties. In such jurisdictions, some of the foregoing disclaimers may not apply to you insofar as they relate to implied warranties.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">15. Limitations Of Liability</h3>
						<p>UNDER NO CIRCUMSTANCES SHALL SYMPEL BE LIABLE FOR DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR EXEMPLARY DAMAGES (EVEN IF SYMPEL HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), RESULTING FROM ANY ASPECT OF YOUR USE OF THE SYMPEL SITE OR THE SERVICE, WHETHER THE DAMAGES ARISE FROM USE OR MISUSE OF THE SYMPEL SITE OR THE SERVICE, FROM INABILITY TO USE THE SYMPEL SITE OR THE SERVICE, OR THE INTERRUPTION, SUSPENSION, MODIFICATION, ALTERATION, OR TERMINATION OF THE SYMPEL SITE OR THE SERVICE. SUCH LIMITATION SHALL ALSO APPLY WITH RESPECT TO DAMAGES INCURRED BY REASON OF OTHER SERVICES OR PRODUCTS RECEIVED THROUGH OR ADVERTISED IN CONNECTION WITH THE SYMPEL SITE OR THE SERVICE OR ANY LINKS ON THE SYMPEL SITE, AS WELL AS BY REASON OF ANY INFORMATION OR ADVICE RECEIVED THROUGH OR ADVERTISED IN CONNECTION WITH THE SYMPEL SITE OR THE SERVICE OR ANY LINKS ON THE SYMPEL SITE. THESE LIMITATIONS SHALL APPLY TO THE FULLEST EXTENT PERMITTED BY LAW. In some jurisdictions, limitations of liability are not permitted. In such jurisdictions, some of the foregoing limitation may not apply to you.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">16. Indemnity</h3>
						<p>You agree to indemnify and hold sympel, its officers, subsidiaries, affiliates, successors, assigns, directors, officers, agents, service providers, suppliers and employees, harmless from any claim or demand, including reasonable attorney fees and court costs, made by any third party due to or arising out of Content you submit, post or make available through the Service, your use of the Service, your violation of the TOU, your breach of any of the representations and warranties herein, or your violation of any rights of another.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">17. General Information</h3>
						<p>The TOU constitute the entire agreement between you and sympel and govern your use of the Service, superseding any prior agreements between you and sympel. The TOU and the relationship between you and sympel shall be governed by the laws of the State of California without regard to its conflict of law provisions. You and sympel agree to submit to the personal and exclusive jurisdiction of the courts located within the county of Katy, Texas. The failure of sympel to exercise or enforce any right or provision of the TOU shall not constitute a waiver of such right or provision. If any provision of the TOU is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties' intentions as reflected in the provision, and the other provisions of the TOU remain in full force and effect. You agree that regardless of any statute or law to the contrary, any claim or cause of action arising out of or related to use of the Service or the TOU must be filed within one (1) year after such claim or cause of action arose or be forever barred.</p>
					</div>

					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">18. Violation Of Terms</h3>
						<p>Please report any violations of the TOU, by flagging the posting(s) for review, or by emailing to: <a href="mailto:hello@sympel.com">hello@sympel.com</a>. Our failure to act with respect to a breach by you or others does not waive our right to act with respect to subsequent or similar breaches. You understand and agree that it is up to the sole discretion of sympel to determine your violation and in such could be subject to banning from the use of sympel’s Service.</p>
					</div>

					<div class="col-md-12 mb-3">
						<h3 class="section-title mt-3 mb-1">20. Feedback</h3>
						<p>We welcome your questions and comments on this document by contacting us at <a href="mailto:hello@sympel.com">hello@sympel.com</a>.</p>
					</div>

				</div>
			</div>
			<div class="tab-pane" id="tabIcon43" aria-labelledby="baseIcon-tab43">
				<div class="card-body collapse in">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h3 class="section-title my-3 text-xs-center">Posting Rules</h3>
                                 <p class="text-sm-center my-3">sympel is dedicated to making the local donation and receiving experience enjoyable. Please follow the guidelines below when posting items.</p>
                                <!--END OF CHECKBOX AREA-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-3">
					<div class="col-md-12">
						<ol>
							<li>Only registered non-profits and charitable organizations can create a “donation request.”  If you are not a registered non-profit or charitable organization you must create a “business” or “individual” profile.</li>
							<li>Any user can “create an donation”.  We as that you respect our community guidelines and post items of value and gently used condition.  All posts will be monitored and per the discretion of sympel employees could be removed at any time.</li>
							<li>To allow users to get a true feel for items they’re considering, please:
								<ul>
									<li>Always include an image of the item. Donation posts with no image, including those with a photo containing only text, aren’t allowed.</li>
									<li>Include high-quality, well-lit photos.</li>
								</ul>
							</li>
							<li>Please limit unique posts to a single account and category.</li>
							<li>sympel is a local marketplace. Please post only in your geographic area so non-profits and charitable organizations can arrange to meet you for local pickup or delivery.</li>
							<li>Titles and descriptions should give buyers a clear, honest, and accurate description so they can best determine whether the item might be what they’re looking for. Please
								<ul>
									<li>Don’t add keywords or price points intended to manipulate search results.</li>
									<li>Don't link to websites or post URLs.</li>
									<li>Don't provide personal information, such as a phone number or email address.</li>
								</ul>
							</li>
							<li>
								Sympel is a donation only community and no items are to be listed for sale.  Any such items will be removed with the user’s account potentially banned.  If any users are listing items for sale please contact sympel and flag the post immediately
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="tabIcon44" aria-labelledby="baseIcon-tab44">
				<div class="card-body collapse in">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h3 class="section-title my-3 text-xs-center">Community Guidelines</h3>
                                 <p class="text-sm-center my-3">sympel is committed to maintaining an inclusive and respectful community that benefits the donor and the charitable organization. As a community we only succeed together by respecting the mutually beneficial factors that bring us together.  Please review our community guidelines when using the service.</p>
                                <!--END OF CHECKBOX AREA-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-3">
					<div class="col-md-12">
						<ul>
							<li>Be courteous.</li>
							<li>Good donations great big impacts.  We don’t expect everything to be perfect and shiny but think about your donation, the value and its condition before posting.  We are a community to help not list your unwanted items.</li>
							<li>Be reasonable with your donation requests.  For those non-profit and charitable organizations be reasonable with what you’re asking for.  Our community is a great group of givers and supporters but they are also people so let’s make sure we are asking for realistic and achievable items to fill your need.</li>
							<li>If you change your mind please communicate with your recipients or donors so they can politely arrange with other interested parties.</li>
							<li>Please communicate on all meet ups, updates and delays between parties.</li>
							<li>We know it can be frustrating when things go wrong. Although it's uncommon, if you have a problem with an item after a donation, try to work it out with the donor in a calm, respectful way. In most cases, they'll be open to finding a solution.</li>
							<li>In addition to these general tips, when using sympel, please refrain from any of the behaviors listed below:
								<ul>
									<li>Profanity or hate speech against other users or sympel employees.</li>
									<li>Threats of violence or actual violence against other users or sympel employees.</li>
									<li>Harassment against other users or sympel employees, such as:
										<ul>
											<li>Targeting another user with complaints about items that were not donated or expressing opinions about items with no intent to meet up.</li>
											<li>Sexual harassment or any comments related to another user’s looks, relationship status, etc.</li>
											<li>Other comments not related to the item.</li>
											<li>Pressuring a user to give a donation or requesting a donation out of the posting format.</li>
										</ul>
									</li>
									<li>Spam and unsolicited offers, such as:
										<ul>
											<li>Unsolicited messages sent to potential donors, including those of a commercial nature.</li>
											<li>Impersonation of another user, sympel employee, or other entity in communications.</li>
											<li>Any other misleading, fake, or malicious communication.</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>Use of disallowed content in your public profile. <br> Examples include:
								<ul>
									<li>Offensive or vulgar profile names or photos, or those that infringe on the intellectual property rights of others.</li>
									<li>Use of the sympel name or image.</li>
									<li>Inclusion of personal contact details.</li>
									<li>Posting another person’s private information, including contact information.</li>
									<li>Non-profit or charitable business details under an “individual” profile. </li>
								</ul>
							</li>
						</ul>
						<p>We may remove content that violates these guidelines. In severe cases or repeated violations, we may suspend or cancel a user account or take other action. For more information, please see our Terms of Service.</p>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="tabIcon45" aria-labelledby="baseIcon-tab45">
			   <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h3 class="section-title my-3 text-xs-center">Prohibited Items Guidelines</h3>
                                 <p class="text-sm-center my-3">Before posting, please read the Prohibited Items list below to ensure that your items are allowed to posted or requested. Additionally, please review our Posting Rules and Community Guidelines. For items that may be subject to regulatory restrictions, it's a good idea to make sure your item is legal to post before posting on sympel. Any item that requires a license to transfer or donate is not the responsibility of sympel and we advise to avoid posting such items. Our Prohibited Items Guidlenie is a guide but it is up to the user to ensure their item is meeting all regulatory transfer requirements.</p>
                                <!--END OF CHECKBOX AREA-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
					<div class="col-md-12">
						<h3 class="section-title mt-1 mb-1">Alcohol, drugs, tobacco, and related products</h3>
						<ul>
							<li>Alcohol</li>
							<li>Prescription drugs</li>
							<li>Drugs, narcotics, or controlled substances (even those that are legal in some states)</li>
							<li>Items marketed for the purpose of intoxication</li>
							<li>Drug paraphernalia such as bongs, vaporizers, and pipes</li>
							<li>Tobacco and related products, including e-cigarettes, e-juice, vaporizers, mods, hookahs, and hookah accessories</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Adult & Mature Content</h3>
						<ul>
							<li>Explicit sexual content or nudity</li>
							<li>Pornography</li>
							<li>Adult toys</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Animals & Animal Products</h3>
						<ul>
							<li>Pets and other live animals</li>
							<li>Animal products derived from endangered or threatened species</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Counterfeit or Replica Items</h3>
						<ul>
							<li>Counterfeits, fakes, and replicas of brand-name items, including items “inspired” by a brand without permission of the owner</li>
							<li>Bootlegged or unauthorized recordings</li>
							<li>Pirated copies of any copyrighted materials</li>
							<li>Use of a trademark or other implied affiliation with a brand</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Dangerous Items</h3>
						<ul>
							<li>Firearms, no exceptions.</li>
							<li>Knives primarily used as weapons or for self-defense. Note: Cutlery, kitchen, and utility knives are generally permitted</li>
							<li>Sporting weapons such as bows and arrows, crossbows, and archery items</li>
							<li>Swords, if sharpened or functional. <strong>Note:</strong> Decorative blunt swords are generally permitted</li>
							<li>Weapon parts and accessories, including any item that attaches to a firearm, ammunition, bullets, clips, arrows, and bolts</li>
							<li>Body armor, including Kevlar and other tactical and protective vests, except protective clothing for sporting activities</li>
							<li>Hazardous Materials such as:
								<ul>
									<li>Fireworks</li>
									<li>Explosives</li>
								</ul>
							</li>
							<li>Recalled Items
								<ul>
									<li>Items subject to recall</li>
									<li>Items deemed to pose significant health or safety risks to others</li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Food Items</h3>
						<ul>
							<li>Most perishable goods, including meat, seafood, dairy, and cut fruits or vegetables</li>
							<li>Homemade shelf products, such as jams, jellies, and pickles</li>
							<li>Homemade meals or baked goods</li>
							<li>Eggs sold outside of the seller's far</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Illegal Items or Encouraging Illegal Activities</h3>
						<p>Any item that is illegal or that encourages illegal activity is not allowed, including but not limited to:</p>
						<ul>
							<li>Stolen or found goods</li>
							<li>Items received through Government Assistance</li>
							<li>Fake or forged documents (such as licenses, IDs, diplomas, and government-issued documents)</li>
							<li>Offers to trade for illegal goods</li>
							<li>Police or Security badges or uniforms. These items can be used to impersonate an officer or gain access to secure areas.</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Intangible Items & Services</h3>
						<ul>
							<li>Services for made-to- order items such as custom food items and flowers</li>
							<li>Services for intangible items such as dog walking, babysitting, and IT support</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Advertisements</h3>
						<ul>
							<li>Links to or information about flea markets, yard sales, and garage sales</li>
							<li>URLs or links to websites</li>
							<li>Rentals and timeshares</li>
							<li>Multi-level marketing schemes and related promotional materials</li>
							<li>Job postings</li>
							<li>Lost pet ads</li>
							<li>Automotive financing</li>
						</ul>
					</div>
					<div class="col-md-12">
						<h3 class="section-title mt-3 mb-1">Medical & Healthcare Items</h3>
						<ul>
							<li>Devices, drugs, and medications that require a prescription from a licensed medical practitioner (such as a dentist, doctor, optometrist, or veterinarian)</li>
							<li>Pills, vitamins, and supplements</li>
							<li>Contact lenses</li>
							<li>Used cosmetics</li>
							<li>Used makeup sponges and applicators</li>
							<li>Needles and items containing needles (such as syringes or tattoo equipment)</li>
						</ul>
					</div>
					<div class="col-md-12 mb-3">
						<h3 class="section-title mt-3 mb-1">Offensive Materials</h3>
						<ul>
							<li>Posts containing racial slurs</li>
							<li>Posts promoting intolerance or discrimination</li>
							<li>Items that promote, support, or commemorate groups with views of hatred or intolerance (for example Nazi, Neo-Nazi, or KKK groups)</li>
							<li>Items that depict or glorify violence against people or animals</li>
						</ul>
						<p>For additional restrictions on behavior such as profanity and harassment, please see Community Guidelines.</p>
					</div>
				</div>
			</div>
		</div>
    </div>		
	
	