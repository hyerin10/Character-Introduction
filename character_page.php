<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <script type="text/javascript">
        // Create a function to add a form to the page
        function addMemoForm() {
            // Create a form element
            var form = document.createElement("form");
            
            // Add an action attribute to the form
            form.setAttribute("action", "#");
            
            // Create a label and input elements
            var label = document.createElement("label");
            var input = document.createElement("input");
            label.innerHTML = "Input: ";
            input.type = "text";
            input.name = "input_name";
            
            // Append the label and input elements to the form
            form.appendChild(label);
            form.appendChild(input);
            
            // Append the form to the body
            document.body.appendChild(form);
        }

        function addForm() {
            // Create a form element
            var form = document.createElement("form");
            
            // Add an action attribute to the form
            form.setAttribute("action", "#");
            
            // Create a label and input elements
            var label = document.createElement("label");
            var input = document.createElement("input");
            label.innerHTML = "Input: ";
            input.type = "text";
            input.name = "input_name";
            
            // Append the label and input elements to the form
            form.appendChild(label);
            form.appendChild(input);
            
            // Append the form to the body
            document.body.appendChild(form);
        }
    </script>
</head>
<body>
  <input type="button" value="메모 추가" onclick="addMemoForm()" />
</body>
</html>