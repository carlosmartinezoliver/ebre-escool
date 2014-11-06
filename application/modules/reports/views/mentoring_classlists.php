<div class="main-content">

<div id="breadcrumbs" class="breadcrumbs">
 <script type="text/javascript">
  try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
 </script>
 <ul class="breadcrumb">
  <li>
   <i class="icon-home home-icon"></i>
   <a href="#">Home</a>
   <span class="divider">
    <i class="icon-angle-right arrow-icon"></i>
   </span>
  </li>
  <li class="active"><?php echo lang('mentoring');?></li>
 </ul>
</div>

<div class="page-content">

<div class="page-header position-relative">
 <h1>
  <?php echo lang('mentoring');?>
  <small>
   <i class="icon-double-angle-right"></i>
    <?php echo "Llistes de classe"; ?>
  </small>
 </h1>
</div>

<div class="alert alert-block alert-warning">
                <button type="button" class="close" data-dismiss="alert">
                  <i class="icon-remove"></i>
                </button>

                <i class="icon-ok green"></i>

                
                <strong class="green">
                  ATENCIÓ : 
                </strong>
                Per mostrar tots els grups a la llista de grups elimineu el filtre de tutor (no seleccioneu cap tutor).
              </div>


<div style='height:10px;'></div>
  <div style="margin:10px;">
    <div class="container">

      <table class="table table-striped table-bordered table-hover table-condensed" id="TODO_filter">
          <thead style="background-color: #d9edf7;">
            <tr>
              <td colspan="6" style="text-align: center;"> <strong>Filtres
                </strong></td>
            </tr>
            <tr> 
              <td><?php echo "Període acadèmic"?>:</td>
              <td>
                <select id="select_class_list_academic_period_filter">
                <?php foreach ($academic_periods as $academic_period_key => $academic_period_value) : ?>
                  <?php if ( $selected_academic_period_id) : ?>
                    <?php if ( $academic_period_key == $selected_academic_period_id) : ?>
                      <option selected="selected" value="<?php echo $academic_period_key ;?>"><?php echo $academic_period_value->shortname ;?></option>
                    <?php else: ?>
                        <option value="<?php echo $academic_period_key ;?>"><?php echo $academic_period_value->shortname ;?></option>
                    <?php endif; ?>
                  <?php else: ?>   
                      <?php if ( $academic_period_value->current == 1) : ?>
                        <option selected="selected" value="<?php echo $academic_period_key ;?>"><?php echo $academic_period_value->shortname ;?></option>
                      <?php else: ?>
                        <option value="<?php echo $academic_period_key ;?>"><?php echo $academic_period_value->shortname ;?></option>
                      <?php endif; ?> 
                  <?php endif; ?> 
                <?php endforeach; ?>
                </select>    
              </td>


               <td><?php echo "Tutors"?>:</td>
               <td>

                <select id="select_class_list_mentor_filter">
                 <option value=""></option>
                <?php foreach ($mentors as $mentor_key => $mentor_value) : ?>
                 <?php if ( $mentor_id ) : ?>
                  <?php if ( $mentor_key == $mentor_id) : ?>
                     <option selected="selected" value="<?php echo $mentor_key ;?>"><?php echo $mentor_value->code . " - " .  $mentor_value->sn1 . " " . $mentor_value->sn2 . ", " . $mentor_value->givenName . " ( càrrec:" . $mentor_value->charge_full . " ) (" . $mentor_value->id  . ")" ;?></option>
                  <?php else: ?>   
                     <option value="<?php echo $mentor_key ;?>"><?php echo $mentor_value->code . " - " .  $mentor_value->sn1 . " " . $mentor_value->sn2 . ", " . $mentor_value->givenName . " ( càrrec:" . $mentor_value->charge_full . " )  (" . $mentor_value->id  . ")";?></option>
                  <?php endif; ?>   
                  <?php else: ?> 
                     <option value="<?php echo $mentor_key ;?>"><?php echo $mentor_value->code . " - " .  $mentor_value->sn1 . " " . $mentor_value->sn2 . ", " . $mentor_value->givenName . " ( càrrec:" . $mentor_value->charge_full . " )  (" . $mentor_value->id  . ")" ;?></option>
                 <?php endif; ?>
                <?php endforeach; ?>
                </select> 

               </td>
               <td><?php echo "Grup de classe"?>:</td>
               <td>
                <select id="select_class_list_classgroup_filter">
                <?php if ( !$mentor_id ) : ?>  
                 <option value=""></option>
                <?php endif; ?>   
                <?php foreach ($all_classgroups as $classgroup_key => $classgroup_value) : ?>
                  <?php if ( $classgroup_key == $default_classroom_group_id) : ?>
                    <option selected="selected" value="<?php echo $classgroup_key ;?>"><?php echo $classgroup_value->code . " - " .  $classgroup_value->name;?></option>
                  <?php else : ?>
                    <option value="<?php echo $classgroup_key ;?>"><?php echo $classgroup_value->code . " - " .  $classgroup_value->name;?> (<?php echo $classgroup_value->id;?>)</option>
                  <?php endif;?>
                <?php endforeach; ?>
                </select> 

              </td>
            </tr>
          </thead>  
        </table> 

        <div class="span2"></div>

        <div class="widget-box span4 collapsed">
                        <div class="widget-header widget-header-small header-color-green">
                          <h6>Filtres alumnes</h6>

                          <span class="widget-toolbar">
                            <a href="#" data-action="collapse">
                              <i class="icon-chevron-down"></i>
                            </a>

                            <a href="#" data-action="close">
                              <i class="icon-remove"></i>
                            </a>
                          </span>
                        </div>

                        <div class="widget-body">
                          <div class="widget-main">
                            
                            <ol class="dd-list">
                      <li class="dd-item dd2-item" data-id="21">
                        <div class="dd-handle dd2-handle">
                          <label><input class="ace" type="checkbox" name="form-field-checkbox" id="checkbox_show_all_students" checked="true"><span class="lbl">&nbsp;</span></label>
                        </div>
                        <div class="dd2-content"><a href="#">Mostrar els estudiants amb UFS soltes</a></div>
                      </li>

                      <li class="dd-item dd2-item" data-id="13">
                        <div class="dd-handle dd2-handle">
                          <label><input class="ace" type="checkbox" name="form-field-checkbox" id="checkbox_show_all_group_enrolled_students" checked="true"><span class="lbl">&nbsp;</span></label>
                        </div>
                        <div class="dd2-content"><a href="<?php echo base_url('/index.php/attendance/attendance_reports/class_list_report'); ?>">Mostrar els alumnes matrículats al grup</a></div>
                      </li>

                      <li class="dd-item dd2-item" data-id="15">
                        <div class="dd-handle dd2-handle">
                          <label><input class="ace" type="checkbox" name="form-field-checkbox" id="checkbox_hide_students"><span class="lbl">&nbsp;</span></label>
                        </div>
                        <div class="dd2-content"><a href="<?php echo base_url('/index.php/attendance/attendance_reports/class_sheet_report'); ?>">Amagar alumnes amagats pel professor (pendent)</a></div>

                      </li>


                    </ol>

                          </div>
                        </div>
                      </div>





      <div class="span4 widget-container-span">
                  <div class="widget-box collapsed">
                    <div class="widget-header widget-header-small header-color-orange">
                      <h6>
                        <i class="icon-sort"></i>
                        Llistats de classe
                      </h6>

                      <div class="widget-toolbar">
                        <a href="#" data-action="collapse">
                          <i class="icon-chevron-down"></i>
                        </a>

                        <a href="#" data-action="close">
                          <i class="icon-remove"></i>
                        </a>
                      </div>
                    </div>

                    <div class="widget-body">
                      <div class="widget-main">                        

                    <ol class="dd-list">

                      <li class="dd-item dd2-item" data-id="13">
                        <div class="dd-handle dd2-handle">
                          <i class="normal-icon icon-download-alt orange bigger-130"></i>
 
                          <i class="drag-icon icon-move bigger-125"></i>
                        </div>
                        <div class="dd2-content"><a target="_blank" href="<?php echo base_url('/index.php/attendance/attendance_reports/class_list_report/' . $academic_period_id . '/' . $default_classroom_group_id . '/true' ); ?>">Llista dels estudiants del grup (amb foto | PDF)</a></div>
                      </li>

                      <li class="dd-item dd2-item" data-id="15">
                        <div class="dd-handle dd2-handle">
                          <i class="normal-icon icon-download-alt blue bigger-130"></i>

                          <i class="drag-icon icon-move bigger-125"></i>
                        </div>
                        <div class="dd2-content"><a target="_blank" href="<?php echo base_url('/index.php/attendance/attendance_reports/class_list_report/' . $academic_period_id . '/' . $default_classroom_group_id . '/false'); ?>">Llista dels estudiants del grup (sense foto | PDF)</a></div>

                      </li>

                      <li class="dd-item dd2-item" data-id="19">
                        <div class="dd-handle dd2-handle">
                          <i class="normal-icon icon-download-alt orange bigger-130"></i>

                          <i class="drag-icon icon-move bigger-125"></i>
                        </div>
                        <div class="dd2-content"><a target="_blank" href="<?php echo base_url('/index.php/attendance/attendance_reports/class_sheet_report/' . $academic_period_id . '/' . $default_classroom_group_id);?>">Llençol amb les fotos dels estudiants (PDF)</a></div>
                      </li>
                    </ol>






                        </p>
                      </div>
                    </div>
                  </div>
                </div>          








      </div>  

        <table class="table table-striped table-bordered table-hover table-condensed" id="class_list">
         <thead style="background-color: #d9edf7;">
          <tr>
            <td colspan="14" style="text-align: center;"> <h4>
              <a href="#">
                <?php echo "Llista de classe"?>. Període acadèmic: <span id="academic_period_text"></div>
              </a>
              </h4></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right;">Nom grup:</td>
            <td colspan="2" style="text-align: left;"> <div id="selected_classgroup_name"></div> </td>
            <td style="text-align: right;">Codi grup:</td>
            <td style="text-align: left;"> <div id="selected_classgroup_code"></div> </td>
            <td style="text-align: right;">Tutor:</td>
            <td colspan="3" style="text-align: left;"> <div id="selected_classgroup_mentor"></div> </td>
          </tr>
          <tr>
             <th><?php echo lang('mentoring_classlists_num')?></th>
             <th><?php echo lang('mentoring_classlists_photo')?></th>
             <th><?php echo lang('mentoring_classlists_student')?></th>
             <th><?php echo lang('mentoring_classlists_officialid')?></th>
             <th><?php echo lang('mentoring_classlists_username')?></th>
             <th><?php echo lang('mentoring_classlists_initial_password')?></th>
             <th><?php echo lang('mentoring_classlists_last_login')?></th>
             <th><?php echo lang('mentoring_classlists_personal_email')?></th>
             <th><?php echo lang('mentoring_classlists_corporative_email')?></th>
             <th>Accions&nbsp;&nbsp;&nbsp;&nbsp;</th>
          </tr>
         </thead>
         
        </table> 

    

    <div class="space-30"></div>


</div>

<script>

function click_on_hidden_student(element) {
  var person_id = element.getAttribute("person_id");
  var classroom_group_id = selected_classroom_group_id();

  console.debug("person_id: " + person_id);
  console.debug("classroom_group_id: " + classroom_group_id);

  //AJAX: hide student on database:

  //AJAX_CORRECT: Change icon
  $("#icon_hide_student_id_" + person_id).toggleClass("icon-eye-close icon-eye-open");
  $("#hide_student_id_" + person_id).toggleClass("purple red");

  if($("#icon_hide_student_id_" + person_id).hasClass('icon-eye-close')){
        $(this).attr('title',"Amagar alumne");
    }else{
        $(this).attr('title','Mostrar alumne');
    }

  if($("#hide_student_id_" + person_id).hasClass('red')){
        $(this).attr('title',"Mostrar alumne");
    }else{
        $(this).attr('title','Amagar alumne');
    }  

  
  
}

var mentor_names = [];
var group_codes = [];
var group_names = [];

<?php if(is_array ($all_classgroups)) : ?>
  <?php foreach ($all_classgroups as $classgroup_key => $classgroup_value) : ?>
  mentor_names[<?php echo $classgroup_key ;?>] = "<?php echo $classgroup_value->mentor_code . ' - ' . $classgroup_value->mentor_sn1 . ' ' . $classgroup_value->mentor_sn2 . ', ' . $classgroup_value->mentor_givenname ;?>";
  group_codes[<?php echo $classgroup_key ;?>] = "<?php echo $classgroup_value->code;?>";
  group_names[<?php echo $classgroup_key ;?>] = "<?php echo $classgroup_value->course_name;?>";
  <?php endforeach; ?>
<?php endif; ?>  




function selected_classroom_group_id(){
  selected_group = $("#select_class_list_classgroup_filter").val();
  //console.debug(selected_group);
  return selected_group;
}

$(function() {

    $("#select_class_list_academic_period_filter").select2();

    $("#academic_period_text").text( $("#select_class_list_academic_period_filter").select2("data").text);

    $('#select_class_list_academic_period_filter').on("change", function(e) {  
        var selectedValue = $("#select_class_list_academic_period_filter").select2("val");
        var pathArray = window.location.pathname.split( '/' );
        var secondLevelLocation = pathArray[1];
        var baseURL = window.location.protocol + "//" + window.location.host + "/" + secondLevelLocation + "/index.php/reports/mentoring_classlists";
        //alert(baseURL + "/" + selectedValue);
        window.location.href = baseURL + "/" + selectedValue;

        var selectedValue = $("#select_class_list_classgroup_filter").select2("val");
        $("#selected_classgroup_name").text(group_names[selectedValue]);
        $("#selected_classgroup_code").text(group_codes[selectedValue]);
        $("#selected_classgroup_mentor").text(mentor_names[selectedValue]);

    });

    $("#select_class_list_mentor_filter").select2({ width: 'resolve', placeholder: "Seleccioneu un tutor", allowClear: true });

    $('#select_class_list_mentor_filter').on("change", function(e) {  
        var selectedValue = $("#select_class_list_mentor_filter").select2("val");

        //console.debug("selectedValue: " + selectedValue);

        if (selectedValue == "") {
          selectedValue = "void";
        }
        
        var pathArray = window.location.pathname.split( '/' );
        var secondLevelLocation = pathArray[1];
        var academic_period_id = $("#select_class_list_academic_period_filter").select2("val");
        var baseURL = window.location.protocol + "//" + window.location.host + "/" + secondLevelLocation + "/index.php/reports/mentoring_classlists/" + academic_period_id;
        //alert(baseURL + "/" + selectedValue);
        window.location.href = baseURL + "/" + selectedValue;

        var selectedValue = $("#select_class_list_classgroup_filter").select2("val");
        $("#selected_classgroup_name").text(group_names[selectedValue]);
        $("#selected_classgroup_code").text(group_codes[selectedValue]);
        $("#selected_classgroup_mentor").text(mentor_names[selectedValue]);
      
    });
    
    //classroom_group_id = 3;
    //console.debug("selected_classroom_group_id: " + selected_classroom_group_id());
   
    var class_list_table = $('#class_list').DataTable( {
                      "bDestroy": true,
                      "sServerMethod": "POST",
                      "sAjaxSource": "<?php echo base_url('index.php/reports/get_class_list');?>", 
                      "fnServerParams": function ( aoData ) {
                          aoData.push( { "name": "classroom_group_id", "value": selected_classroom_group_id() });
                          aoData.push( { "name": "academic_period_id", "value": <?php echo $academic_period_id;?> });
                      },
                      "aoColumns": [
                        { "mData": function(data, type, full) {
                                    return data.number;
                                  }},
                        { "mData": function(data, type, full) {
                                    photos_base_url = "<?php echo base_url('/uploads/person_photos');?>";
                                    return '<img src="' + photos_base_url + '/' + data.photo_url + '" alt="foto alumne" style="width:75px;"></img>';
                                  }},
                        { "mData": function(data, type, full) {
                                    return data.sn1 + " " + data.sn2 + ", " + data.givenName + " (" + data.person_id + ")";
                                  }},
                        { "mData": "person_official_id" },
                        { "mData": "username" },
                        { "mData": "initial_password" },
                        { "mData": "last_login" },
                        { "mData": "personal_email" },
                        { "mData": "corporative_email" },
                        { "mData": function(data, type, full) {
                            var url1 = "<?php echo base_url('/index.php/enrollment/enrollment_query_by_person/false/');?>/" + data.person_official_id;
                            return '<div class="hidden-phone visible-desktop action-buttons"><a class="blue" href="#"><a href="' + url1 + '" target="_blank"><i class="icon-zoom-in bigger-130" title="Consulta matrícula"></i></a></a><?php if ( $user_is_admin ) : ?><a class="green" href="#" title="Modificar matrícula"><i class="icon-pencil bigger-130" title="Modificar matrícula"></i></a><?php endif;?><a person_id="' + data.person_id + '" id="hide_student_id_' + data.person_id + '" class="purple" href="#" title="Amagar alumne" onclick="event.preventDefault();click_on_hidden_student(this);"><i class="icon-eye-close bigger-130" id="icon_hide_student_id_' + data.person_id + '" title="Amagar alumne"></i></a></div><div class="hidden-desktop visible-phone"><div class="inline position-relative"><button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"><i class="icon-caret-down icon-only bigger-120"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close"><li><a href="#" class="tooltip-info" data-rel="tooltip" title="View"><span class="blue"><i class="icon-zoom-in bigger-120"></i>1</span></a></li><li><a href="#" class="tooltip-success" data-rel="tooltip" title="Edit"><span class="green"><i class="icon-edit bigger-120"></i></span></a></li><li><a href="#" class="tooltip-error" data-rel="tooltip" title="Ocultar"><span class="red" title="Amagar alumne"><i class="icon-eye-close bigger-120" title="Amagar alumne"></i></span></a></li></ul></div></div>'
                        }},
                      ],
                      "aLengthMenu": [[10, 25, 50,100,200,-1], [10, 25, 50,100,200, "<?php echo lang('All');?>"]], 
                      "sDom": 'TC<"clear">lfrtip',                    
                      "oTableTools": {
                              "sSwfPath": "<?php echo base_url('assets/grocery_crud/themes/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf');?>",
                              "aButtons": [
                                      {
                                              "sExtends": "copy",
                                              "sButtonText": "<?php echo lang("Copy");?>"
                                      },
                                      {
                                              "sExtends": "csv",
                                              "sButtonText": "CSV"
                                      },
                                      {
                                              "sExtends": "xls",
                                              "sButtonText": "XLS"
                                      },
                                      {
                                              "sExtends": "pdf",
                                              "sPdfOrientation": "landscape",
                                              "sPdfMessage": "<?php echo lang("class_list");?>",
                                              "sTitle": "llista_de_classe",
                                              "sButtonText": "PDF"
                                      },
                                      {
                                              "sExtends": "print",
                                              "sButtonText": "<?php echo lang("Print");?>"
                                      },
                              ]

              },
              "iDisplayLength": 100,
                "oLanguage": {
                        "sProcessing":   "Processant...",
                        "sLengthMenu":   "Mostra _MENU_ registres",
                        "sZeroRecords":  "No s'han trobat registres.",
                        "sInfo":         "Mostrant de _START_ a _END_ de _TOTAL_ registres",
                        "sInfoEmpty":    "Mostrant de 0 a 0 de 0 registres",
                        "sInfoFiltered": "(filtrat de _MAX_ total registres)",
                        "sInfoPostFix":  "",
                        "sSearch":       "Filtrar:",
                        "sUrl":          "",
                        "oPaginate": {
                                "sFirst":    "Primer",
                                "sPrevious": "Anterior",
                                "sNext":     "Següent", 
                                "sLast":     "Últim"    
                        }
            }
        }); 

    $("#select_class_list_classgroup_filter").select2({ width: 'resolve', placeholder: "Seleccioneu un grup de classe", allowClear: true });

    $('#select_class_list_classgroup_filter').on("change", function(e) {  
        var selectedValue = $("#select_class_list_classgroup_filter").select2("val");
        //console.debug("selectedValue: " + selectedValue)
        //json_all_classgroups = "<?php echo json_encode($all_classgroups);?>";

        $("#selected_classgroup_name").text(group_names[selectedValue]);
        $("#selected_classgroup_code").text(group_codes[selectedValue]);
        $("#selected_classgroup_mentor").text(mentor_names[selectedValue]);
        
        class_list_table.ajax.reload();
    });

    var selectedValue = $("#select_class_list_classgroup_filter").select2("val");
    $("#selected_classgroup_name").text(group_names[selectedValue]);
    $("#selected_classgroup_code").text(group_codes[selectedValue]);
    $("#selected_classgroup_mentor").text(mentor_names[selectedValue]);

});


</script>