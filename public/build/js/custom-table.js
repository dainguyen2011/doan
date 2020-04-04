 $(document).ready(function () {
            var data, grid, dialog, editor;
            data = [
                { 'ID': 1, 'Name': 'Hristo Stoichkov', 'PlaceOfBirth': 'Plovdiv, Bulgaria' },
                { 'ID': 2, 'Name': 'Ronaldo Luís Nazário de Lima', 'PlaceOfBirth': 'Rio de Janeiro, Brazil' },
                { 'ID': 3, 'Name': 'David Platt', 'PlaceOfBirth': 'Chadderton, Lancashire, England' },
                { 'ID': 4, 'Name': 'Manuel Neuer', 'PlaceOfBirth': 'Gelsenkirchen, West Germany' },
                { 'ID': 5, 'Name': 'James Rodríguez', 'PlaceOfBirth': 'Cúcuta, Colombia' },
                { 'ID': 6, 'Name': 'Dimitar Berbatov', 'PlaceOfBirth': 'Blagoevgrad, Bulgaria' },
                { 'ID': 7, 'Name': 'Salih Kiraz', 'PlaceOfBirth': 'Ankara, Turkey' },
                { 'ID': 8, 'Name': 'Ronaldo Luís Nazário de Lima', 'PlaceOfBirth': 'Rio de Janeiro, Brazil' },
                { 'ID': 9, 'Name': 'David Platt', 'PlaceOfBirth': 'Chadderton, Lancashire, England' },
                { 'ID': 10, 'Name': 'Manuel Neuer', 'PlaceOfBirth': 'Gelsenkirchen, West Germany' },
                { 'ID': 11, 'Name': 'James Rodríguez', 'PlaceOfBirth': 'Cúcuta, Colombia' },
                { 'ID': 12, 'Name': 'Dimitar Berbatov', 'PlaceOfBirth': 'Blagoevgrad, Bulgaria' },
                { 'ID': 13, 'Name': 'Hristo Stoichkov', 'PlaceOfBirth': 'Plovdiv, Bulgaria' },
                { 'ID': 14, 'Name': 'Ronaldo Luís Nazário de Lima', 'PlaceOfBirth': 'Rio de Janeiro, Brazil' },
                { 'ID': 15, 'Name': 'David Platt', 'PlaceOfBirth': 'Chadderton, Lancashire, England' },
                { 'ID': 16, 'Name': 'Manuel Neuer', 'PlaceOfBirth': 'Gelsenkirchen, West Germany' },
                { 'ID': 17, 'Name': 'James Rodríguez', 'PlaceOfBirth': 'Cúcuta, Colombia' },
                { 'ID': 18, 'Name': 'Dimitar Berbatov', 'PlaceOfBirth': 'Blagoevgrad, Bulgaria' }
            ];
            editor = function ($container, currentValue) {
                $container.append("<input class=\"form-control\" type=\"text\" value=\"" + currentValue + "\"/>");
            };
            grid = $('#grid').grid({
                dataSource: data,
                uiLibrary: 'bootstrap',
                selectionType: 'multiple',
                selectionMethod: 'checkbox',
                columns: [
                      { field: 'ID', width: 100 },
                      { field: 'Name', sortable: true, editor: editor },
                      { field: 'PlaceOfBirth', title: 'Place Of Birth', sortable: true, editor: editor },
                      { title: '', field: 'Edit', width: 34, type: 'icon', icon: 'glyphicon-pencil text-green', tooltip: 'Edit', events: { 'click': EditNormal } },
                      { title: '', field: 'Delete', width: 60, type: 'icon', icon: 'glyphicon-remove text-red', tooltip: 'Delete', events: { 'click': DeleteNormal } }
                ],
                pager: { limit: 10 }
            });
            dialog = $('#dialog_normal').dialog({
                title: 'Add/Edit Record',
                uiLibrary: 'bootstrap',
                autoOpen: false,
                resizable: false,
                modal: true
            });
            function EditNormal(e) {
                $('#dialog_normal #ID').val(e.data.id);
                $('#dialog_normal #Name').val(e.data.record.Name);
                $('#dialog_normal #PlaceOfBirth').val(e.data.record.PlaceOfBirth);
                $('#dialog_normal').dialog('open');
            }
            function DeleteNormal(e) {
                if (confirm('Are you sure?')) {
                    grid.removeRow(e.data.id - 1);
                }
            }
            function SaveNormal() {
                if ($('#dialog_normal #ID').val()) {
                    var id = parseInt($('#dialog_normal #ID').val());
                    grid.updateRow(id, { 'ID': id, 'Name': $('#dialog_normal  #Name').val(), 'PlaceOfBirth': $('#dialog_normal #PlaceOfBirth').val() });
                } else {
                    grid.addRow({ 'ID': grid.count(true) + 1, 'Name': $('#dialog_normal #Name').val(), 'PlaceOfBirth': $('#dialog_normal #PlaceOfBirth').val() });
                }
                dialog.close();
            }
            $('.pnl_normal').find('#btnAdd').on('click', function () {
                $('#dialog_normal #ID').val('');
                $('#dialog_normal #Name').val('');
                $('#dialog_normal #PlaceOfBirth').val('');
                $('#dialog_normal').dialog('open');
            });
            $('#dialog_normal').find('#btnSave').on('click', SaveNormal);
            $('#dialog_normal').find('#btnCancel').on('click', function () {
                dialog.close();
            });
            $('#btnSearch_normal').on('click', function () {
                grid.reload({ Name: $('#txtName_normal').val() });
            });
            $('#btnClear_normal').on('click', function () {
                $('#txtName_normal').val('');
                grid.reload({ Name: '' });
            });


        // Nested grid
            var data_nested, grid_nested;
            data_nested = [
                {
                    'ID': 1, 'Name': 'Hristo Stoichkov', 'PlaceOfBirth': 'Plovdiv, Bulgaria', Clubs: [
                        { Years: '1982–1984', Team: 'Hebros Harmanli', Apps: 32, Goals: 14 },
                        { Years: '1984–1990', Team: 'CSKA Sofia', Apps: 119, Goals: 81 },
                        { Years: '1990–1995', Team: 'Barcelona', Apps: 149, Goals: 77 },
                        { Years: '1995–1996', Team: 'Parma', Apps: 23, Goals: 5 },
                        { Years: '1996–1998', Team: 'Barcelona', Apps: 26, Goals: 7 },
                        { Years: '1998', Team: 'CSKA Sofia', Apps: 4, Goals: 1 },
                        { Years: '1998', Team: 'Al-Nassr', Apps: 2, Goals: 1 },
                        { Years: '1998–1999', Team: 'Kashiwa Reysol', Apps: 27, Goals: 12 },
                        { Years: '2000–2002', Team: 'Chicago Fire', Apps: 51, Goals: 17 },
                        { Years: '2003', Team: 'D.C. United', Apps: 21, Goals: 5 }
                    ]
                },
                {
                    'ID': 2, 'Name': 'Ronaldo Luís Nazário de Lima', 'PlaceOfBirth': 'Rio de Janeiro, Brazil', Clubs: [
                        { Years: '1993–1994', Team: 'Cruzeiro', Apps: 14, Goals: 12 },
                        { Years: '1994–1996', Team: 'PSV', Apps: 46, Goals: 42 },
                        { Years: '1996–1997', Team: 'Barcelona', Apps: 37, Goals: 34 },
                        { Years: '1997–2002', Team: 'Inter Milan', Apps: 68, Goals: 49 },
                        { Years: '2002–2007', Team: 'Real Madrid', Apps: 127, Goals: 83 },
                        { Years: '2007–2008', Team: 'Milan', Apps: 20, Goals: 9 },
                        { Years: '2009–2011', Team: 'Corinthians', Apps: 31, Goals: 18 }
                    ]
                },
                {
                    'ID': 3, 'Name': 'David Platt', 'PlaceOfBirth': 'Chadderton, Lancashire, England', Clubs: [
                        { Years: '1985–1988', Team: 'Crewe Alexandra', Apps: 134, Goals: 56 },
                        { Years: '1988–1991', Team: 'Aston Villa', Apps: 121, Goals: 50 },
                        { Years: '1991–1992', Team: 'Bari', Apps: 29, Goals: 11 },
                        { Years: '1992–1993', Team: 'Juventus', Apps: 16, Goals: 3 },
                        { Years: '1993–1995', Team: 'Sampdoria', Apps: 55, Goals: 17 },
                        { Years: '1995–1998', Team: 'Arsenal', Apps: 88, Goals: 13 },
                        { Years: '1999–2001', Team: 'Nottingham Forest', Apps: 5, Goals: 1 }
                    ]
                }

            ];
            grid_nested = $('#grid_nested').grid({
                dataSource: data_nested,
                uiLibrary: 'bootstrap',
                columns: [
                    { field: 'ID', width: 32 },
                    { field: 'Name' },
                    { field: 'PlaceOfBirth', title: 'Place Of Birth' }
                ],
                detailTemplate: '<div><table/></div>'
            });
            grid_nested.on('detailExpand', function (e, $detailWrapper, record) {
                $detailWrapper.find('table').grid({
                    dataSource: record.Clubs,
                    autoGenerateColumns: true,
                    pager: { limit: 5 }
                });
            });
            grid_nested.on('detailCollapse', function (e, $detailWrapper, record) {
                $detailWrapper.find('table').grid('destroy', true, true);
            });
       


        // connect grid 


       
            var data_con, grid1, grid2;
            data_con = [
                {
                    'ID': 1, 'Name': 'Hristo Stoichkov', 'PlaceOfBirth': 'Plovdiv, Bulgaria', Clubs: [
                        { Years: '1982–1984', Team: 'Hebros Harmanli', Apps: 32, Goals: 14 },
                        { Years: '1984–1990', Team: 'CSKA Sofia', Apps: 119, Goals: 81 },
                        { Years: '1990–1995', Team: 'Barcelona', Apps: 149, Goals: 77 },
                        { Years: '1995–1996', Team: 'Parma', Apps: 23, Goals: 5 },
                        { Years: '1996–1998', Team: 'Barcelona', Apps: 26, Goals: 7 },
                        { Years: '1998', Team: 'CSKA Sofia', Apps: 4, Goals: 1 },
                        { Years: '1998', Team: 'Al-Nassr', Apps: 2, Goals: 1 },
                        { Years: '1998–1999', Team: 'Kashiwa Reysol', Apps: 27, Goals: 12 },
                        { Years: '2000–2002', Team: 'Chicago Fire', Apps: 51, Goals: 17 },
                        { Years: '2003', Team: 'D.C. United', Apps: 21, Goals: 5 }
                    ]
                },
                {
                    'ID': 2, 'Name': 'Ronaldo Luís Nazário de Lima', 'PlaceOfBirth': 'Rio de Janeiro, Brazil', Clubs: [
                        { Years: '1993–1994', Team: 'Cruzeiro', Apps: 14, Goals: 12 },
                        { Years: '1994–1996', Team: 'PSV', Apps: 46, Goals: 42 },
                        { Years: '1996–1997', Team: 'Barcelona', Apps: 37, Goals: 34 },
                        { Years: '1997–2002', Team: 'Inter Milan', Apps: 68, Goals: 49 },
                        { Years: '2002–2007', Team: 'Real Madrid', Apps: 127, Goals: 83 },
                        { Years: '2007–2008', Team: 'Milan', Apps: 20, Goals: 9 },
                        { Years: '2009–2011', Team: 'Corinthians', Apps: 31, Goals: 18 }
                    ]
                },
                {
                    'ID': 3, 'Name': 'David Platt', 'PlaceOfBirth': 'Chadderton, Lancashire, England', Clubs: [
                        { Years: '1985–1988', Team: 'Crewe Alexandra', Apps: 134, Goals: 56 },
                        { Years: '1988–1991', Team: 'Aston Villa', Apps: 121, Goals: 50 },
                        { Years: '1991–1992', Team: 'Bari', Apps: 29, Goals: 11 },
                        { Years: '1992–1993', Team: 'Juventus', Apps: 16, Goals: 3 },
                        { Years: '1993–1995', Team: 'Sampdoria', Apps: 55, Goals: 17 },
                        { Years: '1995–1998', Team: 'Arsenal', Apps: 88, Goals: 13 },
                        { Years: '1999–2001', Team: 'Nottingham Forest', Apps: 5, Goals: 1 }
                    ]
                }

            ];
            grid1 = $('#grid1').grid({
                dataSource: data_con,
                uiLibrary: 'bootstrap',
                columns: [{ field: 'ID' }, { field: 'Name' }, { field: 'PlaceOfBirth' }]
            });
            grid2 = $('#grid2').grid({
                dataSource: [],
                uiLibrary: 'bootstrap',
                columns: [
                    { field: 'Years', width: 100 },
                    { field: 'Team', width: 100 },
                    { field: 'Apps', width: 50 },
                    { field: 'Goals', width: 50 }
                ],
                pager: { limit: 5 }
            });
            grid1.on('rowSelect', function (e, $row, id, record) {
                grid2.data('dataSource', record.Clubs);
                grid2.reload({ page: 1 });
            });


        // material table
       
            var grid_mat, dialog_mat;
            grid_mat = $('#grid_mat').grid({
                dataSource: data,
                uiLibrary: 'materialdesign',
                columns: [
                    { field: 'ID', width: 60 },
                    { field: 'Name', sortable: true },
                    { field: 'PlaceOfBirth', title: 'Place Of Birth', sortable: true },
                    { title: '', field: 'Edit', width: 56, tmpl: '<i class="material-icons" style="font-size: 16px; cursor: pointer;">mode_edit</i>', tooltip: 'Edit', events: { 'click': Edit } },
                    { title: '', field: 'Delete', width: 56, tmpl: '<i class="material-icons" style="font-size: 16px; cursor: pointer;">close</i>', tooltip: 'Delete', events: { 'click': Delete } }
                ],
                pager: { limit: 5, sizes: [2, 5, 10, 20] }
            });
            dialog_mat = $('#dialog_mat').dialog({
                uiLibrary: 'materialdesign',
                title: 'Player',
                autoOpen: false,
                resizable: false,
                modal: true,
                width: 400
            });
            function Edit(e) {
                $('#dialog_mat  #ID').val(e.data.id);
                $('#dialog_mat #Name').val(e.data.record.Name);
                $('#dialog_mat #PlaceOfBirth').val(e.data.record.PlaceOfBirth);
                $('#dialog_mat').dialog('open');
            }
            function Delete(e) {
                if (confirm('Are you sure?')) {
                    alert('TODO: Write code that delete the data on the server.');
                    grid_mat.reload(); //load the new data from the server after the deletion
                }
            }
            function Save() {
                if ($('#dialog_mat  #ID').val()) {
                    var id = parseInt($('#dialog_mat #ID').val());
                    alert('TODO: Write code that update the data on the server.');
                    grid_mat.updateRow(id, { 'ID': id, 'Name': $('#dialog_mat #Name').val(), 'PlaceOfBirth': $('#dialog_mat #PlaceOfBirth').val() });
                } else {
                    alert('TODO: Write code that add the new record on the server.');
                    grid_mat.addRow({ 'ID': grid_mat.count(true) + 1, 'Name': $('#dialog_mat #Name').val(), 'PlaceOfBirth': $('#dialog_mat #PlaceOfBirth').val() });
                }
                dialog_mat.close();
            }
            $('.pnl_material #btnAdd').on('click', function () {
                $('#dialog_mat #ID').val('');
                $('#dialog_mat #Name').val('');
                $('#dialog_mat #PlaceOfBirth').val('');
                $(' #dialog_mat').dialog('open');
            });
            $('#dialog_mat #btnSave').on('click', Save);
            $('#dialog_mat #btnCancel').on('click', function () {
                dialog_mat.close();
            });
            $('.pnl_material #btnSearch').on('click', function () {
                grid_mat.reload({ Name: $('.pnl_material #txtQuery').val() });
            });
            $('.pnl_material #btnClear').on('click', function () {
                $('.pnl_material #txtQuery').val('');
                grid_mat.reload({ Name: '' });
            });
        });