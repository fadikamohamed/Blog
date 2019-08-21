<script>
tinymce.init({
  mode: "specific_textareas",
  editor_selector: "wysiwyg",**/
  selector: 'textarea',
  height: 500,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools wordcount",
        "emoticons",
        "media",
        "fullpage",
        "quickbars",
        "fullscreen",
        "textpattern"
    ],
    textpattern_patterns: [
     {start: '*', end: '*', format: 'italic'},
     {start: '**', end: '**', format: 'bold'},
     {start: '#', format: 'h1'},
     {start: '##', format: 'h2'},
     {start: '###', format: 'h3'},
     {start: '####', format: 'h4'},
     {start: '#####', format: 'h5'},
     {start: '######', format: 'h6'},
     {start: '1. ', cmd: 'InsertOrderedList'},
     {start: '* ', cmd: 'InsertUnorderedList'},
     {start: '- ', cmd: 'InsertUnorderedList'},
     {start: '//brb', replacement: 'Be Right Back'}
  ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | emoticons | media fullpage forecolor backcolor fullscreen",
    media_url_resolver: function (data, resolve/*, reject*/) {
    if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {
      var embedHtml = '<iframe src="' + data.url +
      '" width="400" height="400" ></iframe>';
      resolve({html: embedHtml});
    } else {
      resolve({html: ''});
    }
  },  
  // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>




<script>
tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools wordcount",
        "emoticons",
        "media",
        "fullpage",
        "quickbars",
        "fullscreen",
        "textpattern"
    ],
    textpattern_patterns: [
     {start: '*', end: '*', format: 'italic'},
     {start: '**', end: '**', format: 'bold'},
     {start: '#', format: 'h1'},
     {start: '##', format: 'h2'},
     {start: '###', format: 'h3'},
     {start: '####', format: 'h4'},
     {start: '#####', format: 'h5'},
     {start: '######', format: 'h6'},
     {start: '1. ', cmd: 'InsertOrderedList'},
     {start: '* ', cmd: 'InsertUnorderedList'},
     {start: '- ', cmd: 'InsertUnorderedList'},
     {start: '//brb', replacement: 'Be Right Back'}
  ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | emoticons | media fullpage forecolor backcolor fullscreen",
    media_url_resolver: function (data, resolve/*, reject*/) {
    if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {
      var embedHtml = '<iframe src="' + data.url +
      '" width="400" height="400" ></iframe>';
      resolve({html: embedHtml});
    } else {
      resolve({html: ''});
    }
  },  
  // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>