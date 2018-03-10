<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="POST" enctype="multipart/form-data" id="fileUploadForm">
        <input type="hidden" name="email" id="email" value="email" >
<input type="hidden" name="chattopic" id="chattopic" value="chattopic" > 
<input type="hidden" name="company" id="company" value="company" >
	<input type="text" name="name">
	<input type="file" name="file">
	<input type="submit" name="submit" id="btnSubmit">
</form>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

    $("#btnSubmit").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#fileUploadForm')[0];

		// Create an FormData object
        var data = new FormData(form);

		// If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

		// disabled the submit button
        $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "livechat_submit.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
            	
                $("#result").text(data);
                console.log("SUCCESS : ", data);
                $("#btnSubmit").prop("disabled", false);

            },
            error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }
        });

    });

});
</script>
</html>  