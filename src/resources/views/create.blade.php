<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <!-- CKEditor JS faylini ulash -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body>
    <div style="margin: 20px;">
        <form method="POST" action="/submit">
            @csrf <!-- Laravel CSRF token -->
            
            <!-- Textarea -->
            <label for="editor">Matnni kiriting:</label>
            <textarea name="content" id="editor" rows="10" cols="80"></textarea>
            
            <!-- Rasm yuklash uchun input -->
            <input type="file" id="imageUpload" accept="image/*" style="margin-top: 10px;">
            
            <!-- Matn rangini tanlash uchun input -->
            <input type="color" id="textColor" style="margin-top: 10px;" title="Matn rangini tanlang">

            <button type="submit" style="margin-top: 10px;">Saqlash</button>
        </form>
    </div>

    <!-- CKEditor-ni sozlash -->
    <script nonce="{{ request()->attributes->get('csp_nonce') }}">
        document.addEventListener('DOMContentLoaded', function() {
            // CKEditor-ni textarea bilan almashtirish
            CKEDITOR.replace('editor', {
                height: 400,
                extraPlugins: 'colorbutton', // Matn rangini o'zgartirish uchun
                toolbar: [
                    { name: 'colors', items: ['TextColor', 'BGColor'] }, // Rang tugmalari
                    { name: 'basic', items: ['Bold', 'Italic', 'Underline'] } // Asosiy vositalar
                ]
            });

            // Rasm yuklash funksiyasi
            document.getElementById('imageUpload').addEventListener('change', function(e) {
                var file = e.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var img = '<img src="' + event.target.result + '" style="max-width: 100%;">';
                        CKEDITOR.instances['editor'].insertHtml(img);
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Iltimos, faqat rasm fayllarini yuklang!');
                }
            });

            // Tashqi rang tanlash inputi orqali matn rangini o'zgartirish
            document.getElementById('textColor').addEventListener('change', function(e) {
                var color = e.target.value;
                CKEDITOR.instances['editor'].execCommand('forecolor', color);
            });
        });
    </script>
</body>
</html>