<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.0.0/ckeditor5.css" crossorigin>
<style>
:root {
	--ck-content-font-family: 'Lato';
}

.main-container {
	font-family: var(--ck-content-font-family);
	width: fit-content;
	margin-left: auto;
	margin-right: auto;
}

.editor-container_classic-editor .editor-container__editor {
	min-width: 795px;
	max-width: 795px;
}
    .ck-editor__editable_inline {
	min-height: 300px;

}


.ck-heading_heading1{
    font-size: 3rem;
    text-align:center;
    margin-top:10px;
}

</style>

 <div class="p-6">
    <div class="my-3">
        <button class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded" id="create_post_btn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                d="M5 13l4 4L19 7"/></svg>
            Pievienot jaunu rakstu
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Virsraksts</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Datums</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Darbības</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td class="px-4 py-2 text-sm"><?=$post->id?></td>
                    <td class="px-4 py-2 text-sm"><?=$post->post_title?></td>
                    <td class="px-4 py-2 text-sm"><?=$post->post_date?></td>
                    <td class="px-4 py-2 text-sm">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rediģēt rakstu</button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <!-- Pievieno vairāk rindu šeit -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modālais logs -->
    <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
   <form action="" method="POST" id="new_post_form">
  <!-- ✅ Modal Box -->
  <div class="bg-white w-200 rounded-lg p-6 relative shadow-lg">
    <h2 class="text-xl font-bold mb-4">Pievienot rakstu</h2>
   
    <div>
                 
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Your name"
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <!-- Textarea input -->
      <div>
        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
        <textarea
          id="editor"
          name="message"
          rows=""
          placeholder="Your message"
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>
      </div>            
    </div>

    <!-- ✅ Close Button (X) -->
    <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-black text-2xl" type="button">&times;</button>

    <!-- ✅ Footer Buttons -->
    <div class="flex justify-end gap-2 mt-6">
      <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400" id="cancelBtn" type="button" id="cancel_btn">Cancel</button>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">Confirm</button>
    </div>
  </div>
</form>
</div>     

<script src="https://cdn.ckeditor.com/ckeditor5/46.0.0/ckeditor5.umd.js" crossorigin></script>
<script src="https://cdn.ckeditor.com/ckeditor5/46.0.0/translations/lv.umd.js" crossorigin></script>

<script>
 /**
 * This configuration was generated using the CKEditor 5 Builder. You can modify it anytime using this link:
 * https://ckeditor.com/ckeditor-5/builder/?redirect=portal#installation/NoNgNARATAdA7DADBSAWAzOxAOKBWbPRARiynRHTm0QOzhEQE5UpFV6onMQUIAbAG4pEYYMTCjRE6QF1IeOMQCmAQwBGqiLKA===
 */

const {
	ClassicEditor,
	Alignment,
	Autoformat,
	AutoImage,
	AutoLink,
	Autosave,
	BlockQuote,
	Bold,
	Emoji,
	Essentials,
	FontBackgroundColor,
	FontColor,
	FontFamily,
	FontSize,
	GeneralHtmlSupport,
	Heading,
	ImageBlock,
	ImageCaption,
	ImageInline,
	ImageInsert,
	ImageInsertViaUrl,
	ImageResize,
	ImageStyle,
	ImageTextAlternative,
	ImageToolbar,
	ImageUpload,
	Indent,
	IndentBlock,
	Italic,
	Link,
	List,
	ListProperties,
	MediaEmbed,
	Mention,
	Paragraph,
	PasteFromOffice,
	SimpleUploadAdapter,
	SourceEditing,
	Table,
	TableCaption,
	TableCellProperties,
	TableColumnResize,
	TableProperties,
	TableToolbar,
	TextTransformation,
	TodoList,
	Underline
} = window.CKEDITOR;

const LICENSE_KEY =
	'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3ODE3NDA3OTksImp0aSI6IjI0OTEzMmY1LWJlNzItNGU2OC04YWNhLWZhMGU0OGNiYmVlOSIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIiwiRTJQIiwiRTJXIl0sInZjIjoiOTViNDIxZDAifQ.CXoOlxNj-1ToIjkw_SJDLX9_4exDSaeTNDjXcu7rKeoJdaprjbRgnVVl2i4lk8CRh4wvPopAYuZ6IjXGghlAJA';

const editorConfig = {
	toolbar: {
		items: [
			'undo',
			'redo',
			'|',
			'sourceEditing',
			'|',
			'heading',
			'|',
			'fontSize',
			'fontFamily',
			'fontColor',
			'fontBackgroundColor',
			'|',
			'bold',
			'italic',
			'underline',
			'|',
			'emoji',
			'link',
			'insertImage',
			'mediaEmbed',
			'insertTable',
			'blockQuote',
			'|',
			'alignment',
			'|',
			'bulletedList',
			'numberedList',
			'todoList',
			'outdent',
			'indent'
		],
		shouldNotGroupWhenFull: false
	},
	plugins: [
		Alignment,
		Autoformat,
		AutoImage,
		AutoLink,
		Autosave,
		BlockQuote,
		Bold,
		Emoji,
		Essentials,
		FontBackgroundColor,
		FontColor,
		FontFamily,
		FontSize,
		GeneralHtmlSupport,
		Heading,
		ImageBlock,
		ImageCaption,
		ImageInline,
		ImageInsert,
		ImageInsertViaUrl,
		ImageResize,
		ImageStyle,
		ImageTextAlternative,
		ImageToolbar,
		ImageUpload,
		Indent,
		IndentBlock,
		Italic,
		Link,
		List,
		ListProperties,
		MediaEmbed,
		Mention,
		Paragraph,
		PasteFromOffice,
		SimpleUploadAdapter,
		SourceEditing,
		Table,
		TableCaption,
		TableCellProperties,
		TableColumnResize,
		TableProperties,
		TableToolbar,
		TextTransformation,
		TodoList,
		Underline
	],
    simpleUpload: {
        uploadUrl: '<?=base_url("/admin/post/upload")?>',
        error: {
            "message": "The image upload failed because the image was too big (max 1.5MB)."
	    },
    },
	fontFamily: {
		supportAllValues: true
	},
	fontSize: {
		options: [10, 12, 14, 'default', 18, 20, 22],
		supportAllValues: true
	},
	heading: {
		options: [
			{
				model: 'paragraph',
				title: 'Paragraph',
				class: 'ck-heading_paragraph'
			},
			{
				model: 'heading1',
				view: 'h1',
				title: 'Heading 1',
				class: 'ck-heading_heading1'
			},
			{
				model: 'heading2',
				view: 'h2',
				title: 'Heading 2',
				class: 'ck-heading_heading2'
			},
			{
				model: 'heading3',
				view: 'h3',
				title: 'Heading 3',
				class: 'ck-heading_heading3'
			},
			{
				model: 'heading4',
				view: 'h4',
				title: 'Heading 4',
				class: 'ck-heading_heading4'
			},
			{
				model: 'heading5',
				view: 'h5',
				title: 'Heading 5',
				class: 'ck-heading_heading5'
			},
			{
				model: 'heading6',
				view: 'h6',
				title: 'Heading 6',
				class: 'ck-heading_heading6'
			}
		]
	},
	htmlSupport: {
		allow: [
			{
				name: /^.*$/,
				styles: true,
				attributes: true,
				classes: true
			}
		]
	},
	image: {
		toolbar: [
			'toggleImageCaption',
			'imageTextAlternative',
			'|',
			'imageStyle:inline',
			'imageStyle:wrapText',
			'imageStyle:breakText',
			'|',
			'resizeImage'
		]
	},

	language: 'lv',
	licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3ODE3NDA3OTksImp0aSI6IjQyZDE2YTM0LTdiNTMtNGE0ZS1hMmE3LTIwZGE3OGE5ZGUwNSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkUyUCIsIkUyVyJdLCJ2YyI6IjUzMGU1ZTU3In0.F3z9OozbYqWJiEqm4CYqICGla2aoemLIc69Sbcev0xGPB-pPfy3PjOA9GTW_5gOgVWS9hVoBZdet02ta8rxtqA',
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	list: {
		properties: {
			styles: true,
			startIndex: true,
			reversed: true
		}
	},
	mention: {
		feeds: [
			{
				marker: '@',
				feed: [
					/* See: https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html */
				]
			}
		]
	},
	placeholder: 'Type or paste your content here!',
	table: {
		contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
	}
};

ClassicEditor.create(document.querySelector('#editor'), editorConfig);

                  
</script>

<script>

    $(document).ready(function(){
         $('#closeModal, #cancelBtn').click(()=>{
            $('#myModal').addClass('hidden');
         })   


         $('#create_post_btn').click(()=>{
             $('#myModal').removeClass('hidden');
         })

         $('#new_post_form').submit((e)=>{
                e.preventDefault();
                data = $('#new_post_form').serialize();
                $.post('<?=base_url('admin/posts/create')?>',data,(resp)=>{
                   if(resp.saved=="ok"){
                         $('#myModal').addClass('hidden');
                         window.location.reload();
                   }
                })

         })


    })




</script>

<!-- modālais logs -->

<?= $this->endSection() ?>



<!-- 

-->


