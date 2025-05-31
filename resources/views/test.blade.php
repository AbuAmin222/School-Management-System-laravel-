<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Form</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('#add-form');
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                alert('تم منع الإرسال');
            });
        });
    </script>
</head>
<body>
    <form id="add-form">
        <input type="text" name="count_section" placeholder="أدخل عدد الأقسام">
        <button type="submit">Insert</button>
    </form>
</body>
</html>
