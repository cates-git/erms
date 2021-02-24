// $(function () {
//     //Horizontal form basic
//     $('#wizard_horizontal').steps({
//         headerTag: 'h2',
//         bodyTag: 'section',
//         transitionEffect: 'slideLeft',
//         next: 'Save and Continue',
//         titleTemplate: "#title#",
//         onInit: function (event, currentIndex) {//Set tab width
//             var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
//             var tabCount = $tab.length;
//             $tab.css('width', (100 / tabCount) + '%');

//             var $tab_link = $(event.currentTarget).find('ul[role="tablist"] li a');
//             var maxHeight = $tab_link[0].clientHeight;
//             for (let i = 0, l = tabCount; i < l; i++) {
//                 if ($tab_link[i].clientHeight > maxHeight) {
//                     maxHeight = $tab_link[i].clientHeight
//                 }
//             }
//             $tab_link.css('height', maxHeight + 'px');

//             loadPlugins();
            
//             setTableForm();
            
//             setButtonWavesEffect(event);
//         },
//         onStepChanging: function (event, currentIndex, newIndex) {

//             console.log(currentIndex)
//             return true
//         },
//         onStepChanged: function (event, currentIndex, priorIndex) {
//             setButtonWavesEffect(event);
//         },
//         onFinishing: function (event, currentIndex) {
//             console.log('onFinishing')
//             return true
//         },
//         onFinished: function (event, currentIndex) {
//             // swal("Good job!", "Submitted!", "success");
//             $('#submit-employee').click();
//         }
//     });
// });

// function setButtonWavesEffect(event) {
//     $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
//     $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
// }

// function setTableForm () {
//     $('.table-form').on('click', '.add-one-row', function () {
//         $tableBody = $(this).parents('table').find('tbody');
//         $row = $tableBody.find('tr:first-child').html();
//         $tableBody.append('<tr>' + $row + '</tr>');
        
//         $tableBody.find('button.remove-table-row').show();

//         initMaskedDate();
//         $.AdminBSB.input.activate();

//         return false;
//     });
    
//     $('.table-form').on('click', '.remove-table-row', function () {
//         $tableBody = $(this).parents('table').find('tbody');
//         var total_rows = $tableBody.find('tr').length;
//         if (total_rows > 1) {
//             $(this).parents('tr').remove();
//         }
        
//         if (total_rows < 3) {
//             $tableBody.find('button.remove-table-row').hide();
//         }
//         return false;
//     });
// }

// function loadPlugins () {
//     $.AdminBSB.input.activate();
    
//     initMaskedDate();
// }

// function initMaskedDate() {
//     //Date
//     $('.demo-masked-input').find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
//     // Year
//     $('.demo-masked-input').find('.year-range').inputmask('y - y', { placeholder: '____ - ____' });

//     $('.demo-masked-input').find('.year').inputmask('y', { placeholder: '____' });
// }

// function addRowHelper (name) {
//     $parentDiv = $('.'+name);
//     $parentDiv.find('select:not(.ms)').selectpicker('destroy');

//     var row_number = $parentDiv.find('.'+name+'-row').length
//     $newRowDiv = $parentDiv.find('.'+name+'-row').eq(0).clone();
    
//     $newRowDiv.find('input').each(function () {
//         if (this.type == 'text') {
//             this.value = '';
//         }
//         this.name = this.name.replace('[0]', '['+row_number+']');
//     })
//     $newRowDiv.find('select:not(.ms)').each(function () {
//         this.value = this.options[0].value;
//     })
    
//     $parentDiv.append($newRowDiv);

//     initMaskedDate();
//     $.AdminBSB.input.activate();

//     $parentDiv.find('select:not(.ms)').selectpicker('refresh');
//     $lastRow = $parentDiv.find('.'+name+'-row:last-child');
//     $lastRow.find('.card-inside-title').text((row_number + 1) + '.');
//     $lastRow.find('.form-line.focused').removeClass('focused');

//     $('.remove-'+name+'').show();
// }

// function removeRowHelper(name) {
//     $parentDiv = $('.'+name);
//     var total_rows = $parentDiv.find('.'+name+'-row').length;
//     if (total_rows > 1) {
//         $parentDiv.find('.'+name+'-row:last-child').remove();
//     }

//     if (total_rows < 3) {
//         $('.remove-'+name+'').hide();
//     }
// }