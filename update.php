<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h1>Update a Book</h1>
    <form>
        <div class="form-group">
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <option value="english">English</option>
                <option value="arabic">Arabic</option>
                <option value="french">French</option>
                <option value="spanish">Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="availability">Availability:</label>
            <input type="checkbox" id="availability" name="availability">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>