function sendEmails() {
  var sheet = SpreadsheetApp.getActiveSheet();
  var EMAIL_SENT = "EMAIL_SENT";

  var START_ROW = 2;

  var columnWidth = sheet.getLastColumn();    // Set the column width. Assumes that the last column is the EMAIL_SENT column
  Logger.log('columnWidth: ' + columnWidth);

  var htmlOutput = HtmlService.createHtmlOutputFromFile('volunteers-email');
  var html_body = htmlOutput.getContent();

  // Fetch all the rows that have data in them
  var dataRange = sheet.getDataRange()
  // shift down to the start of the data set
  var dataRange = dataRange.offset(START_ROW - 1, 0, dataRange.getNumRows());
  // Fetch values for each row in the Range.
  var data = dataRange.getValues();
  for (var i = 0; i < data.length; ++i) {
    var row = data[i];
    if (row[0] === undefined || row[0] === "") {
      continue;
    }

    var emailAddress = row[5];  // Sixth column
    var message = "Hello, World \n. Timestamp: " + row[0];       // First Column
    var subject = "Thanks for registering as a volunteer at Code Club Aotearoa!";

    var emailSent = row[14];     // Third column
    if (emailSent != EMAIL_SENT) {  // Prevents sending duplicates
      Logger.log('sending email to: ' + emailAddress);
      Logger.log('I\'m on row: ' + i);
      Logger.log('Email sent cell value: ' + row[14]);

      // Comment this back in when ready
      MailApp.sendEmail(emailAddress, subject, message, {
        htmlBody: html_body
      });
      sheet.getRange(i + START_ROW, 15).setValue(EMAIL_SENT);

      // Make sure the cell is updated right away in case the script is interrupted
      SpreadsheetApp.flush();
    }
  }
}
