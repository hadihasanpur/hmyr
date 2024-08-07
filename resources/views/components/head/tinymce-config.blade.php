<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#description', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    promotion: false,
    language: 'fa',
    directionality: 'rtl',
    language_url: '/js/tinymce/langs/fa.js', // path from the root of your web application — / — to the language pack(s)
    language_load: true,
  });
</script>