
$(function() {

    /* data table export buttons and table pagination */
    $('#blotter_table').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    });

    $("input[name=optradio]").on('click', function(){
        var y = $("input:checked").val();
        var x = document.getElementById("case_input");
        if (y == "other") {
            x.style.display = "block";
        }else{
            x.style.display = "none";
        }
    });

    $("#involvepersontype").on('change', function(){
        if($(this).val() === 'complainant'){
            $('.complainant_form').show();
            $('.offender_form').hide();
            $("input[name=residentIdOffender]").val(0);
            $("input[name=residentId]").val(0);
        }else{
            $("input[name=residentId]").val(0);
            $("input[name=residentIdOffender]").val(0);
            $('.complainant_form').hide();
            $('.offender_form').show();
        }
    });

    $("input[name=name]").attr('disabled','disabled');
    $("input[name=contact_number]").attr('disabled','disabled');
    $("select[name=gender]").attr('disabled','disabled');
    $("input[name=birthday]").attr('disabled','disabled');
    $("input[name=address]").attr('disabled','disabled');
    $("input[name=offender_name]").attr('disabled','disabled');
            $("select[name=offender_gender]").attr('disabled','disabled');
            $("input[name=offender_address]").attr('disabled','disabled');

    $('#resident_table').DataTable();
    $('#personInvolve').DataTable();
    $('#resident_table_offender').DataTable();

    $('#show-resident').on('click', function(){
        $("input[name=complainantType]").val(1);
        $("input[name=complainantTypeOffender]").val(1);
    });

    $('#show-off-resident').on('click', function(){
        $("input[name=complainantTypeOffender]").val(1);
        $("input[name=complainantType]").val(1);
    });

    $('#resident_table tbody tr').on('click', function(){
        var offenderExist = false;
        var complainantExist = false;
        var case_id = $("input[name=case_id]").val();
        var id = $(this).attr('resident-id');
        var type = $("input[name=complainantType]").val();
        // alert(type);
        var typeOffender = $("input[name=complainantTypeOffender]").val();
        // alert(typeOffender);
        if(id !=  $("input[name=residentIdOffender]").val()){
            $.ajax({
                method: 'POST',
                url: 'lib/class.controller.php',
                dataType: 'json',
                data: {
                    'resident_id' : id,
                    'case_id' : case_id,
                    'function' : 'checkPerson',
                },
                success: function (data){
                    console.log(data);
                    // alert(data);
                    if(data === 'complainant'){
                        complainantExist = true;
                    }else if (data === 'offender'){
                        offenderExist = true;
                    }

                    // alert(type);
                    // alert(typeOffender);

                    if(type == '2'){
                        complainantExist = false;
                    }
                    if(typeOffender == '2'){
                        offenderExist = false;
                    }

                    // alert(offenderExist);

                    if(!offenderExist){
                        if(!complainantExist){
                            $.ajax({
                                url: 'lib/class.controller.php',
                                method:"POST",
                                data: {
                                    'function':'getResidentDetails',
                                    'resident_id' : id
                                },
                                async: false,
                                success: function (data) {
                                    residentDetails = JSON.parse(data);
                                    
                                    var lname;
                                    var fname;
                                    var mname;
                                    var suffix;

                                    if(residentDetails[0].res_lName !== null){
                                        lname = residentDetails[0].res_lName;
                                    }
                                    else{
                                        lname = "";
                                    }
                                    if(residentDetails[0].res_fName !== null){
                                        fname = residentDetails[0].res_fName;
                                    }
                                    else{
                                        fname = "";
                                    }
                                    if(residentDetails[0].res_mName !== null){
                                        mname = residentDetails[0].res_mName;
                                    }
                                    else{
                                        mname = "";
                                    }
                                    if(residentDetails[0].suffix !== null && residentDetails[0].suffix!="N/A"){
                                        suffix = residentDetails[0].suffix;
                                    }
                                    else{
                                        suffix = "";
                                    }
                                    var fullName = lname+' '+fname+', '+mname+' '+suffix
                                    $("input[name=name]").val(fullName);
                                    $("input[name=contact_number]").val(residentDetails[0].contact_telnum);
                                    $("select[name=gender]").append("<option selected value='"+residentDetails[0].gender_Name.toLowerCase()+"'>"+residentDetails[0].gender_Name+"</option>");
                                    if( residentDetails[0].address_Lot_No !== null  &&  residentDetails[0].address_Block_No !== null  &&  residentDetails[0].address_House_No !== null && residentDetails[0].address_Street_Name !== null && residentDetails[0].address_Subdivition !== null){
                                        $("input[name=address]").val(residentDetails[0].address_House_No+' '+ residentDetails[0].address_Street_Name+' '+ residentDetails[0].address_Subdivision);
                                    }
                                    $("input[name=birthday]").val(residentDetails[0].res_Bday);
                                    $("input[name=residentId]").val(id);
                                    $("input[name=complainantType]").val(1);

                                    $('#residentList').modal('hide');
                                },
                                error: function(error){
                                    console.log(error);
                                }
                            });
                        }else{
                            alert('This person is already added as complainant!');                    
                        }
                    }else{
                        alert('This person is already added as offender!');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        }else{
            alert('You already selected this person as offender!')
        }
    });

    $('#resident_table_offender tbody tr').on('click', function(){
        var id = $(this).attr('resident-id');
        var offenderExist = false;
        var complainantExist = false;
        var case_id = $("input[name=case_id]").val();
        var type = $("input[name=complainantType]").val();
        var typeOffender = $("input[name=complainantTypeOffender]").val();


        if(id != $("input[name=residentId]").val()){
            $.ajax({
                method: 'POST',
                url: 'lib/class.controller.php',
                dataType: 'json',
                data: {
                    'resident_id' : id,
                    'case_id' : case_id,
                    'function' : 'checkPerson',
                },
                success: function (data){
                    console.log(data);
                    if(data === 'complainant'){
                        complainantExist = true;
                    }else if (data === 'offender'){
                        offenderExist = true;
                    }

                    if(type == '2'){
                        complainantExist = false;
                    }
                    if(typeOffender == '2'){
                        offenderExist = false;
                    }

                    // alert(offenderExist);
                    if(!offenderExist){
                        if(!complainantExist){
                            $.ajax({
                                url: 'lib/class.controller.php',
                                method:"POST",
                                data: {
                                    'function':'getResidentDetails',
                                    'resident_id' : id
                                },
                                async: false,
                                success: function (data) {
                                    residentDetails = JSON.parse(data);
                                    var lname;
                                    var fname;
                                    var mname;
                                    var suffix;

                                    if(residentDetails[0].res_lName !== null){
                                        lname = residentDetails[0].res_lName;
                                    }
                                    else{
                                        lname = "";
                                    }
                                    if(residentDetails[0].res_fName !== null){
                                        fname = residentDetails[0].res_fName;
                                    }
                                    else{
                                        fname = "";
                                    }
                                    if(residentDetails[0].res_mName !== null){
                                        mname = residentDetails[0].res_mName;
                                    }
                                    else{
                                        mname = "";
                                    }
                                    if(residentDetails[0].suffix !== null && residentDetails[0].suffix!="N/A"){
                                        suffix = residentDetails[0].suffix;
                                    }
                                    else{
                                        suffix = "";
                                    }

                                    var fullName = lname+' '+fname+', '+mname+' '+suffix
                                    
                                    $("input[name=offender_name]").val(fullName);
                                    $("select[name=offender_gender]").append("<option selected value='"+residentDetails[0].gender_Name.toLowerCase()+"'>"+residentDetails[0].gender_Name+"</option>");
                                    if( residentDetails[0].address_Lot_No !== null  &&  residentDetails[0].address_Block_No !== null  &&  residentDetails[0].address_House_No !== null && residentDetails[0].address_Street_Name !== null && residentDetails[0].address_Subdivition !== null){
                                        $("input[name=offender_address]").val(residentDetails[0].address_House_No+' '+ residentDetails[0].address_Street_Name+' '+ residentDetails[0].address_Subdivision);
                                    }
                                    $("textarea[name=offender_description]").val();
                                
                                    $("input[name=complainantTypeOffender]").val(1);
                                    $("input[name=residentIdOffender]").val(id);

                                    $('#residentListOffender').modal('hide');
                                },
                                error: function(error){
                                    console.log(error);
                                }
                            });
                        }else{
                            alert('This person is already added as complainant!');                    
                        }
                    }else{
                        alert('This person is already added as offender!');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        }else{
            alert('You already selected this person as complainant!')
        }
    });


    function getAge(birthDate) {
        var now = new Date();
      
        function isLeap(year) {
          return year % 4 == 0 && (year % 100 != 0 || year % 400 == 0);
        }
      
        // days since the birthdate    
        var days = Math.floor((now.getTime() - birthDate.getTime())/1000/60/60/24);
        var age = 0;
        // iterate the years
        for (var y = birthDate.getFullYear(); y <= now.getFullYear(); y++){
          var daysInYear = isLeap(y) ? 366 : 365;
          if (days >= daysInYear){
            days -= daysInYear;
            age++;
            // increment the age only if there are available enough days for the year.
          }
        }
        return age;
      }

    /* populate list of validation in drowdown menu / select input */
    var violation = loadViolationData();
    function loadViolationData(){
        $.ajax({
            url: 'lib/class.controller.php',
            method:"POST",
            data: {'function':'getViolation'},
            // async: false,
            success: function (data) {
                violation = JSON.parse(data);
            },
            error: function(error){
                console.log(error);
            }
        });
        return violation;
    }
    
    // console.log(violation);
    for(var k in violation){
        var option = "<option value="+violation[k].violation_ID+">"+violation[k].violation_Name+"</option>";
        $('#violation').append(option);
        // console.log(option);
    }

    /* date and time picker */

    $('#incidentTime').datetimepicker({
        format:'HH:mm a'
    });

    $('#birthday').datetimepicker({
        format:'DD/MM/YYYY'
    });

    $('#incidentDate').datetimepicker({
        format:'DD/MM/YYYY'
    });


    $.validator.setDefaults({
        highlight: function(element) {
            $(element)
            .closest('.form-group input')
            .addClass('is-invalid');
            $(element)
            .closest('.form-group textarea')
            .addClass('is-invalid');
            $(element)
            .closest('.form-group select')
            .addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element)
            .closest('.form-group input')
            .removeClass('is-invalid')
            .addClass('is-valid');
            $(element)
            .closest('.form-group textarea')
            .removeClass('is-invalid')
            .addClass('is-valid');
            $(element)
            .closest('.form-group select')
            .removeClass('is-invalid')
            .addClass('is-valid');
        }
    });


    // show resident list

    /* =============== VALIDATOR for insert and update incident/blotter============== */
    
    $("#updatePersonInvolve").validate({
        rules:{
            name:{
                required: true
            },
            gender:{
                required: true
            },
            birthday:{
                required: true
            },
            address:{
                required: true
            },
            offender_description:{
                required: true
            },
        },
        messages:{
            name:{
                requred: "Please enter your name."
            },
        },
        submitHandler: function() {
            var resident_id;
            var case_id = $("input[name=case_id]").val();
            var person_id = $("input[name=person_id]").val();
            var offender_id = $("input[name=offender_id]").val();

            if(person_id > 0 && person_id !== 'undefined'){
                var personType = 'complainant';
            }else if(offender_id > 0 && offender_id !== 'undefined'){
                var personType = 'offender';
            }

            var resident_idComplainant = $("input[name=residentId]").val();
            var resident_idOffender = $("input[name=residentIdOffender]").val();

            if( resident_idComplainant > 0 && resident_idComplainant !== 'undefined'){
                resident_id = resident_idComplainant;
            }else if(resident_idOffender > 0 && resident_idOffender !== 'undefined'){
                resident_id = resident_idOffender;
            }

            var name = $("input[ name=name").val();
            var contact_number = $("input[name=contact_number]").val();
            var gender = $("select[name=gender]").val();
            var birthday = $("input[name=birthday]").val();
            var address = $("input[name=address]").val();
            var type = $("input[name=complainantType]").val();

            var offender_name = $("input[name=offender_name]").val();
            var offender_gender = $("select[name=offender_gender]").val();
            var offender_address = $("input[name=offender_address]").val();
            var offender_description = $("textarea[name=offender_description]").val();
            var typeOffender = $("input[name=complainantTypeOffender]").val();

                            if(personType === 'complainant'){
                                $.ajax({
                                    method: 'POST',
                                    url: 'lib/class.controller.php',
                                    dataType: 'json',
                                    data: {
                                        'person_id' : person_id,
                                        'case_id' : case_id,
                                        'resident_id' : resident_id,
                                        'complianantType': type,
                                        'name' : name, 
                                        'contact_number': contact_number,
                                        'gender': gender,
                                        'birthday': birthday,
                                        'address': address,
                                        'function': 'updateComplainant',
                                    },
                                    success: function (data){
                                        if(data == 'success'){
                                            alert('Data Successfully saved!');
                                            window.location.replace('incident.php');
                                        }
                                    },
                                    error: function(data){
                                        console.log(data);
                                    }
                                });  
                            }
            
                            if(personType === 'offender'){
                                $.ajax({
                                    method: 'POST',
                                    url: 'lib/class.controller.php',
                                    dataType: 'json',
                                    data: {
                                        'offender_id' : offender_id,
                                        'case_id' : case_id,
                                        'resident_idOffender' : resident_id,
                                        'complianantOffender': typeOffender,
                                        'offender_name': offender_name,
                                        'offender_gender': offender_gender,
                                        'offender_address': offender_address,
                                        'offender_description': offender_description,
                                        'function': 'updateOffender',
                                    },
                                    success: function (data){
                                        // alert(data);
                                        if(data == 'success'){
                                            alert('Data Successfully saved!');
                                            window.location.replace('incident.php');
                                        }
                                    },
                                    error: function(data){
                                        console.log(data);
                                    }
                                });  
                            }
        }

    });
        
    $("#newPersonInvolve").validate({
        rules:{
            name:{
                required: true
            },
            gender:{
                required: true
            },
            address:{
                required: true
            },
            offender_name:{
                required: true
            },
            offender_gender:{
                required: true
            },
            offender_address:{
                required: true
            },
            offender_description:{
                required: true
            },
        },
        messages:{
            name:{
                requred: "Please enter your name."
            },
        },
        submitHandler: function() {
            // var resident_id = 0;
            var personType = $('#involvepersontype').val();
            var case_id = $("input[name=case_id]").val();
            var name = $("input[name=name]").val();
            var contact_number = $("input[name=contact_number]").val();
            var gender = $("select[name=gender]").val();
            var birthday = $("input[name=birthday]").val();
            var address = $("input[name=address]").val();
            var resident_idComplainant = $("input[name=residentId]").val();
            var type = $("input[name=complainantType]").val();
            
            var offender_name = $("input[name=offender_name]").val();
            var offender_gender = $("select[name=offender_gender]").val();
            var offender_address = $("input[name=offender_address]").val();
            var offender_description = $("textarea[name=offender_description]").val();
            var typeOffender = $("input[name=complainantTypeOffender]").val();

            var resident_idOffender = $("input[name=residentIdOffender]").val();
                            if(personType === 'complainant'){
                                $.ajax({
                                    method: 'POST',
                                    url: 'lib/class.controller.php',
                                    dataType: 'json',
                                    data: {
                                        'case_id' : case_id,
                                        'resident_id' : resident_idComplainant,
                                        'complianantType': type,
                                        'name' : name, 
                                        'contact_number': contact_number,
                                        'gender': gender,
                                        'birthday': birthday,
                                        'address': address,

                                        'function': 'addComplainant',
                                    },
                                    success: function (data){
                                        // alert(data);
                                        if(data == 'success'){
                                            alert('Data Successfully saved!');
                                            window.location.replace('incident.php');
                                        }
                                    },
                                    error: function(data){
                                        // alert(data);
                                        console.log(data);
                                    }
                                });  
                            }

                            if(personType === 'offender'){
                                $.ajax({
                                    method: 'POST',
                                    url: 'lib/class.controller.php',
                                    dataType: 'json',
                                    data: {
                                        'case_id' : case_id,
                                        'resident_idOffender' : resident_idOffender,
                                        'complianantOffender': typeOffender,
                                        'offender_name': offender_name,
                                        'offender_gender': offender_gender,
                                        'offender_address': offender_address,
                                        'offender_description': offender_description,

                                        'function': 'addOffender',
                                    },
                                    success: function (data){
                                        if(data == 'success'){
                                            alert('Data Successfully saved!');
                                            window.location.replace('incident.php');
                                        }
                                    },
                                    error: function(data){
                                        console.log(data);
                                        // alert(data);
                                    }
                                });  
                            }
        }

    });
    
    
    
    $("#validateForm").validate({
        rules:{
            name:{
                required: true
            },
            gender:{
                required: true
            },
            birthday:{
                required: true
            },
            address:{
                required: true
            },
            offender_description:{
                required: true,
            },
            incident_title:{
                required: true,
            },
            date:{
                required: true,
            },
            time:{
                required: true,
            },
            incident_location:{
                required: true
            },
            narrative:{
                required: true
            },
        },
        messages:{
            name:{
                requred: "Please enter your name."
            },
        },
        submitHandler: function() {
            
            var name = $("input[name=name]").val();
            var contact_number = $("input[name=contact_number]").val();
            var gender = $("select[name=gender]").val();
            var birthday = $("input[name=birthday]").val();
            var address = $("input[name=address]").val();
            var resident_id = $("input[name=residentId]").val();
            var type = $("input[name=complainantType]").val();

            var offender_name = $("input[name=offender_name]").val();
            var offender_gender = $("select[name=offender_gender]").val();
            var offender_address = $("input[name=offender_address]").val();
            var offender_description = $("textarea[name=offender_description]").val();
            var typeOffender = $("input[name=complainantTypeOffender]").val();
            var resident_idOffender = $("input[name=residentIdOffender]").val();
            
            var blotter_type = $("select[name=blotter_type]").val();

            var incident_title = $("input[name=incident_title]").val();
            var date = $("input[name=date]").val();
            var time = $("input[name=time]").val();
            var incident_location = $("input[name=incident_location]").val();
            var narrative = $("textarea[name=narrative]").val();
            var action = $('button[name=save]').val();
            var dataId = $('button[name=save]').data('id');
            var status = $('select[name=status]').val();

            var y = $("input:checked").val();
            var x = document.getElementById("case_input");
            if (y == "other") {
                var incident_type = x.value;
            }else{
                var incident_type = y;
            }

            if(action === 'insert'){
                insert(blotter_type,resident_id,resident_idOffender,type,typeOffender,name,contact_number,gender,birthday, address,offender_name,offender_gender,offender_address,offender_description,incident_type,incident_title,date,time, incident_location, narrative);    
            }

            if(action === 'update'){
                $.ajax({
                    method: 'POST',
                    url: 'lib/class.controller.php',
                    dataType: 'json',
                    data: {
                        'blotter_type' : blotter_type,
                        'resident_id' : resident_id,
                        'resident_idOffender' : resident_idOffender,
                        'complianantType': type,
                        'complianantOffender': typeOffender,
                        'name' : name, 
                        'contact_number': contact_number,
                        'gender': gender,
                        'birthday': birthday,
                        'address': address,
                        'offender_name': offender_name,
                        'offender_gender': offender_gender,
                        'offender_address': offender_address,
                        'offender_description': offender_description,
                        'incident_title': incident_title,
                        'incident_type': incident_type,
                        'date': date,
                        'time': time,
                        'incident_location': incident_location,
                        'narrative': narrative,

                        'function': 'updateIncident',
                        'data_id': dataId,
                        'status': status,
                    },
                    success: function (data){
                        if(data == 'success'){
                            alert('Data Successfully saved!');
                            window.location.replace('incident.php');
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });  
            }
        }

    });


    $('#complainanttype').on('change', function(){
        $type = $(this).val();

        if($type === 'outsider'){
            $('#show-resident').hide();
            $("input[name=complainantType]").val(2);
            $("input[name=name]").removeAttr('disabled','disabled');
            $("input[name=contact_number]").removeAttr('disabled','disabled');
            $("select[name=gender]").removeAttr('disabled','disabled');
            $("input[name=birthday]").removeAttr('disabled','disabled');
            $("input[name=address]").removeAttr('disabled','disabled');
            
        }else{
            $("input[name=complainantType]").val(1);
            $('#show-resident').show();
            $("input[name=name]").attr('disabled','disabled');
            $("input[name=contact_number]").attr('disabled','disabled');
            $("select[name=gender]").attr('disabled','disabled');
            $("input[name=birthday]").attr('disabled','disabled');
            $("input[name=address]").attr('disabled','disabled');
        }
    });

    $('#offendertype').on('change', function(){
        $type = $(this).val();

        if($type === 'outsider'){
            $('#show-off-resident').hide();
            
            $("input[name=complainantTypeOffender]").val(2);
            $("input[name=offender_name]").removeAttr('disabled','disabled');
            $("select[name=offender_gender]").removeAttr('disabled','disabled');
            $("input[name=offender_address]").removeAttr('disabled','disabled');
            
        }else{
            $('#show-off-resident').show();
            $("input[name=complainantTypeOffender]").val(1);

            $("input[name=offender_name]").attr('disabled','disabled');
            $("select[name=offender_gender]").attr('disabled','disabled');
            $("input[name=offender_address]").attr('disabled','disabled');
        }

    });

    function insert(blotterType,residentId,residentIdOffender,Type,TypeOffender,Name,contactNumber,Gender,Birthday, Address,offenderName,offenderGender,offenderAddress,offenderDescription,incidentType,incidentTitle,DateHappened,Time, incidentLocation, Narrative){
        $.ajax({
            method: 'POST',
            url: 'lib/class.controller.php',
            dataType: 'json',
            data: {
                'blotter_type' : blotterType,
                'resident_id' : residentId,
                'resident_idOffender' : residentIdOffender,
                'complianantType': Type,
                'complianantOffender': TypeOffender,
                'name' : Name, 
                'contact_number': contactNumber,
                'gender': Gender,
                'birthday': Birthday,
                'address': Address,
                'offender_name': offenderName,
                'offender_gender': offenderGender,
                'offender_address': offenderAddress,
                'offender_description': offenderDescription,
                'incident_title': incidentTitle,
                'incident_type': incidentType,
                'date': DateHappened,
                'time': Time,
                'incident_location': incidentLocation,
                'narrative': Narrative,
                'function': 'insertIncident',
            },
            success: function (data){
                if(data == 'success'){
                    alert('Data Successfully saved!');
                    window.location.replace('incident.php');
                }
            },
            error: function(data){
                console.log(data);
            }
        });
        return false;
    }

    /* 
    * for main content height 
    * set the main content height equal to the window height 
    */
    setContentWrapperHeight();
    $(window).resize(function(){
        setContentWrapperHeight();
    });

    function setContentWrapperHeight(){
        var windowHeight = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;
        var contentHeight = document.getElementById('content-wrapper').offsetHeight;
        var navbarHeight = document.getElementById('navbar').offsetHeight;
        var totalHeight = parseFloat(windowHeight) - parseFloat(navbarHeight);

        if(contentHeight < totalHeight){
            document.getElementById('content-wrapper').style.height = totalHeight+'px';
        }
    }



    /*=============== chart js ==============*/
    /*
    var json = report();
    function report(){
        $.ajax({
            url: 'lib/class.controller.php',
            method:"POST",
            data: {'function':'incidentReport'},
            async: false,
            success: function (data) {
                json = JSON.parse(data);
            },
            error: function(error){
                console.log(error);
            }
        });
        return json;
    }

    // console.log(json);

    var year = [];
    var count = [];

    for(var i in json){
        year.push(json[i].year);
        count.push(json[i].count);
    }

    var salesChartCanvas = $("#incident_report").get(0).getContext("2d");
    var salesChartData = {
      labels: year,
      datasets: [
        {
            label: "Incident",
            borderColor: "#c45850",
            fill: false,  
            data: count
        }
      ]
    };
    var salesChartOptions = {
        title: {
            display: true,
            text: 'Barangay incident reported every year'
        },
        responsive: true
    };
    //Create the line chart

    new Chart(salesChartCanvas,{
        type: 'line',
        data: salesChartData,
        options: salesChartOptions
    });
    */
});