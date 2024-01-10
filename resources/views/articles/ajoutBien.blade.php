<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Dynamique</title>
    <style>
        .room-container {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <form id="dynamicForm">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <br>

        <label for="nombreChambres">Nombre de Chambres:</label>
        <select id="nombreChambres" name="nombreChambres" onchange="generateRoomInputs()">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>

        <div id="roomsContainer"></div>

        <input type="submit" value="Soumettre">
    </form>

    <script>
        function generateRoomInputs() {
            var container = document.getElementById('roomsContainer');
            container.innerHTML = ''; // Clear previous inputs

            var numberOfRooms = document.getElementById('nombreChambres').value;

            for (var i = 0; i < numberOfRooms; i++) {
                var roomDiv = document.createElement('div');
                roomDiv.className = 'room-container';

                var fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.name = 'imageChambre' + (i + 1);
                fileInput.accept = 'image/*';
                fileInput.required = true;
                fileInput.setAttribute('style', 'margin-right: 10px;');

                var dimensionInput = document.createElement('input');
                dimensionInput.type = 'number';
                dimensionInput.name = 'dimensionChambre' + (i + 1);
                dimensionInput.placeholder = 'Dimension de la chambre ' + (i + 1);
                dimensionInput.required = true;

                roomDiv.appendChild(fileInput);
                roomDiv.appendChild(dimensionInput);

                container.appendChild(roomDiv);
            }
        }
    </script>

</body>

</html>