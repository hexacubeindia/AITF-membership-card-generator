# AITF-membership-card-generator

Instant Membership Management and ID card generation of AITF (All India Telugu Federation).

Once, member signup using https://www.allindiatf.com/regular-member/, using contact form 7, email with signup details and the following data will be sent to admin.

//-------------------Mail Body-----------------//

https://www.allindiatf.com/member/approve.php?amemberid=[membership-id]&aemail=[email]
<br>
Click the above link to approve the membership.
Approval notification and link for membership ID card generation will be sent to applicant email upon confirmation.
<br>
<hr>
<br>
https://www.allindiatf.com/member/reject.php?amemberid=[membership-id]&aemail=[email]
Click the above link to reject the membership.
Denial notification will be sent to applicant email.

//-------------------End of Mail Body-----------------//

Upon clicking, approve/ reject, coorresponging php file will be called with memberid and email parameters.

member data will be loaded from sql database.

ID card will be generated from loaded data.
