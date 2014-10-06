<?php

/**
 * @author Dave Jay <dave.jay90@gmail.com>
 * @version 1.0
 * @package goldbar_list_management
 * 
 */
$allowed = array('csv');

if (isset($_REQUEST['parseFile'])) {

    $fileName = $_REQUEST['fName'];

    $giName = "gi_" . $fileName;
    $nonName = "nonGI_" . $fileName;

    $fpGI = fopen("uploads/{$giName}", 'w');
    $fpNonGI = fopen("uploads/{$nonName}", 'w');

    $re_gi = '/(?:\@(?:a(?:ol\.(?:co(?:m(?:\.(?:[bt]r|au))?|\.(?:nz|uk))|[np]l|d[ek]|f[ir]|i[nt]|be|es|jp)|(?:t(?:lanticbb|t)|ccesscable|rvig)\.net|d(?:am\.com\.au|elphia\.net)|merit(?:rade\.com|ech\.net)|lice(?:adsl\.fr|\.it)|apt\.net\.au|im\.com|bv\.bg)|y(?:a(?:hoo\.(?:c(?:o(?:m(?:\.(?:a[ru]|c[no]|m[xy]|t[rw]|v[en]|br|hk|ph|sg))?|\.(?:i[dn]|jp|kr|nz|th|uk|za))|[aln])|i[ent]|d[ek]|f[ir]|n[lo]|bg|es|gr|pl|ro|se)|ndex\.ru)|7?mail\.com)|c(?:(?:e(?:ntury(?:link|tel)|bridge|getel)|l(?:ear(?:wire)?|assicnet)|harter(?:mi)?)\.net|o(?:(?:m(?:porium|cast)|x)\.net|geco\.ca)|able(?:vision\.(?:qc\.ca|com)|one\.net)|s\.com)|w(?:a(?:vecable\.(?:com|net)|lla\.co(?:\.il|m)|nadoo\.fr)|i(?:nd(?:owslive\.com|stream\.net)|ldblue\.net)|o(?:rldnet\.att\.net|wway\.com)|mconnect\.com|bcable\.net|eb\.de|p\.pl)|l(?:i(?:ve(?:\.(?:c(?:o(?:m(?:\.(?:p[hkt]|a[ru]|m[xy]|sg))?|\.(?:kr|uk|za))|[aln])|i[ent]|[bs]e|d[ek]|f[ir]|n[lo]|at|hk|jp|ru)|mail\.tw)|bero\.it|st\.ru)|aposte\.net|ycos\.com)|b(?:(?:t(?:(?:interne|connec)t|openworld)|reakthru)\.com|lue(?:yonder\.co\.uk|win\.ch)|igpond\.(?:com|net)(?:\.au)?|ell(?:atlantic|south)?\.net|(?:ol\.com\.b|box\.f)r|k\.ru)|h(?:otmail\.(?:c(?:o(?:m(?:\.(?:a[ru]|t[rw]|br|hk|vn))?|\.(?:i[dln]|jp|kr|nz|th|uk|za))|[ahlz])|i[ent]|s[egk]|[er]s|d[ek]|f[ir]|n[lo]|be|gr|hu|lt|my|ph|ua)|ughes\.net)|m(?:e(?:t(?:rocast\.net|a\.ua)|\.com)|y(?:(?:space|way)\.com|mts\.net)|sn\.(?:c(?:om(?:\.au)?|n)|fr)|a(?:il\.(?:com|ru)|c\.com)|(?:indspring|chsi)\.com)|n(?:e(?:t(?:scape|zero)\.(?:com|net)|uf\.fr)|(?:ationwide|tlworld)\.com|orthstate\.net|umericable\.fr)|t(?:e(?:l(?:ia\.com|us\.net)|sco\.net)|(?:alktalk|ds)\.net|iscali\.co\.uk|-online\.de|len\.pl)|e(?:a(?:st(?:link\.ca|ex\.net)|rthlink\.(?:com|net))|(?:mbarqmail|xcite)\.com|ircom\.net)|o(?:p(?:t(?:usnet\.com\.au|online\.net)|\.pl)|(?:net|2)\.pl|lympus\.net|range\.fr)|i(?:n(?:(?:sightbb)?\.com|box\.(?:com|lv)|teria\.pl)|owatelecom\.net|cqmail\.com)|s(?:(?:uddenlink|bcglobal)\.net|haw(?:us\.com|\.ca)|ympatico\.ca|ky\.com|fr\.fr)|f(?:r(?:ontier(?:net\.net|\.com)|ee(?:mail\.hu|\.fr))|acebook\.com|smail\.net)|v(?:i(?:rgin(?:media\.com|\.net)|deotron\.ca)|erizon\.net|olia\.fr|p\.pl)|r(?:(?:o(?:adrunner|cketmail|gers)|ediff(?:mail)?)\.com|ambler\.ru)|(?:g(?:(?:oogle)?mail|eocities)|dslextreme|juno)\.com|k(?:ingwoodcable\.(?:com|net)|nology\.net)|u(?:sa(?:media\.tv|\.net)|k[2r]\.net)|zoom(?:internet\.net|town\.com)|p(?:eoplepc\.com|rodigy\.net)|x(?:plornet\.com|tra\.co\.nz))|\.rr\.com)$/i';

    $row = 1;
    $emailIndex = 0;
    if (($handle = fopen("uploads/{$fileName}", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($row == '1') {
                foreach ($data as $index => $column) {
                    if (strtolower($column) == 'email') {
                        $emailIndex = $index;
                    }
                }
                fputcsv($fpGI, $data);
                fputcsv($fpNonGI, $data);
            } else {
                if (!(preg_match($re_gi, $data[$emailIndex]))) {
                    fputcsv($fpGI, $data);
                } else {
                    fputcsv($fpNonGI, $data);
                }
            }
            $row++;
        }
        fclose($handle);
    }
    print json_encode(array('gi' => $giName, "non_gi" => $nonName));
    die;
}

if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {
    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($extension), $allowed)) {
        echo '{"status":"error"}';
        exit;
    }
    $currentTime = time();
    $tmp_name = $currentTime . "_" . mt_rand(1, 100000) . "." . $extension;
    if (move_uploaded_file($_FILES['upl']['tmp_name'], _PATH . 'uploads/' . $tmp_name)) {
        echo json_encode(array('status' => "success", "fileName" => $tmp_name));
        exit;
    }
    die;
}







$jsInclude = "list.js.php";
_cg("page_title", "List Management");
?>