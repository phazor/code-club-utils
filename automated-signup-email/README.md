# google-sheets

This code adds the auto-reply functionality for website signups.

## Basic premise

This code adds auto-reply functionality for signups to the website. Website signups go via a google form to a google sheet. Attached to that sheet is a google script (javascript + libraries) which runs whenever a form is completed. The process to link website, sheet, form and script together is somewhat manual, which I've documented below.

## Set Up

### Set up your form/sheet.

This scripts require a venues form and a volunteers form to be set up with (at least) the following fields. You may wish to add more.

For Venues:
* First Name
* Last Name
* Email address
* Venue name
* Venue Type (School, Library, IT Company, Other)
* Address
* City
* Suburb
* Region

For Volunteers
* First Name
* Last Name
* City
* Suburb
* Region
* Email address


### Set up your script

There are two forms (one for volunteers, one for venues), so therefore there are two scripts that need to be created.

Scripts were created by following the tutorial from: https://developers.google.com/apps-script/articles/sending_emails

Before you start: ensure that you are logged in as the email address that you want to have the emails sent from. This is important because script owners can’t be changed after creation, without deleting the script and starting again.
1. Open your Venues/Volunteers sheet
2. Navigate to Tools -> Script Editor
3. Create a new blank script
4. Paste the code below (or write your own!)
5. Create a new file called venue-email.html (or volunteer-email.html). Fill this with your signup email (can be anything, as long as it’s valid html)
6. Test your script!
    1. Edit out the email addresses on a test sheet, or add the EMAIL_SENT text to the correct column (look at this very carefully, remember that column references in the code are indexed from 0 while getDataRange offset is indexed from 1).
    2. Add logs (Logger.log(“thing”)) or debug points if you like.
    3. Run your script by pressing the run button (a right arrow)
7. Set up script triggers to make the script fire upon certain events, such as form submit
    1. Open Resources -> Current Project’s Triggers.
    2. Set up a trigger for form submit
    3. You will need to authorise the app to send emails. Note that the currently active author of the sheet (visible in the top right) will be the person who is the ‘sender’ of all the emails
8. Save, and you’re done!
9. Repeat for the other sheet (volunteers)

## Notes:

Within the scripts, `venue-email` and `volunteer-email` refer to the html emails to send to new signups. These should be valid html files, created at the same tree level as their respective scripts.
