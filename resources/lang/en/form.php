<?php
return [

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/
'question'=>[

    'diagnoses' => '1. Diagnoses',
    'past_medical_history' => '2. PMHx : Past medical history',
    
    'chest_pain' => '3.	CP: Chest pain',
    'chest_pain_a' => 'a. How many times do you feel chest pain in a day?',
    'chest_pain_b' => 'b. Where about in the chest do you feel pain?',
    'chest_pain_c' => 'c. How long does the chest pain last for?',
    'chest_pain_d' => 'd. What causes you chest pain?',
    'chest_pain_e' => 'e. Does anything make chest pain better?',
    'chest_pain_f' => 'f. Have you seen anyone about your chest pain?',
    'chest_pain_g' => 'g. Other',

    'tightness' => '4. T: Tightness',
    'pulpitations' => '5. P: Pulpitations',
    'shortness_of_breath' => '6. SOB: Shortness of breath',
    
    'shortness_of_breath_a'=>'a. How often do you feel SOB?',
    'shortness_of_breath_b'=>'b. What makes SOB better?',
    'shortness_of_breath_c'=>'c. What makes SOB worse?',
    'shortness_of_breath_d'=>'d. Was there a cause for SOB?',
    'shortness_of_breath_e'=>'e. Other',


    'orthopnea' => '7.	O: Orthopnea',
    'pnd' => '8.	PND: Paroxysmal nocturnal dyspnea',
    'swelling_of_ankles' => '9.	SOA: Swelling of ankles',

    'coughing' => '10.	C: Coughing',
    'coughing_a' => 'a.	How often do you cough?',

    'wheezing' => '11.	W: Wheezing',
    'sputum' => '12.	S: Sputum',
    'dizziness' => '13.	D: Dizziness',

    'presyncope'  => '14.	PRE: Presyncope',
    'tiredness'  => '15.	Tiredness',
    'exercise'  => '16.	Exercise',
    'exercise_a'  => 'a.	How many days in a week do you do exercise?',
    'exercise_b'  => 'b.	For how many minutes do you exercise each day?',

    'other_symptoms'  => '17.	Other',
    'other_symptoms'  => '18.	Other',
    'other_symptoms'  => '19.	Other',
    'central_nervous_system'  => '20.	CNS: Central nervous system',
    'musculoskeletal'  => '21.	MSK: Musculoskeletal',
    'gastrointestinal'  => '22.	GI: Gastrointestinal',
    'urogenital_symptoms'  => '23.	UGS: Urogenital symptoms',
    'skin'  => '24.	Skin',
    'gynae'  => '25. Gynae',

    'medications'  => '26.	Meds: Medications',
    'medications_a' =>'a.	What medicine do you take?',
    'medications_b' =>'b.	Why do you take medication?',
    'medications_c' =>'c.	How long have you been taking medication for?',
    'medications_d' =>'d.	How often do you take medication?',
    'medications_e' =>'e.	What dose do you take?',
    'medications_f' =>'f.	Other',

    'drug_allergies'  => '27.	Drug allergies',
    'updates'  => '28.	Updates',

    'risk_factors'  => '29.	RF: Risk factors',
    'risk_factors_a' => 'a.	Do you smoke?',
    'risk_factors_b' => 'b.	Do you drink?',
    'risk_factors_c' => 'c.	What is your diet like?',

    'family_history'  => '30.	FHx: Family History',
    'interventions'  => '31.	Invs: Interventions',
    'new_tests'  => '32.	New tests',

    'if_yes_show_below_details'  => 'If selected `Yes`, please write below details. ',
],
'placeholder'=>[
    'diagnoses' => '(Please write about your diagnoses.)',
    'past_medical_history' => '(Please enter your past medical history.)',
    'chest_pain' => '(Please select `Yes` if you feel chest pain.)',
    'tightness' => '(Do you feel tightness? To know about tightness, please click here.)',
    
    'pulpitations' => '(Do you feel pulpitations? To know about pulpitations, please click here.)',
    'shortness_of_breath' => '(Please select `Yes` if you feel shortness of breath (SOB).)',
    'shortness_of_breath_other' => 'Is there anything else about feeling shortness of breath that you would like to mention? Please write.',
    'orthopnea' => '(Do you feel orthopnea? To know about orthopnea, please click here.)',
    'pnd' => '(Do you feel paroxysmal nocturnal dyspnea (PND)? To know about PND, please click here.)',
    'swelling_of_ankles' => '(Do you suffer swelling of ankles?)',
    'coughing' => '(Do you feel coughing?)',
    'wheezing' => '(Do you feel wheezing? To know about wheezing, please click here.)',
    'sputum' => '(Do you get sputum?)',
    'dizziness' => '(Do you feel dizziness? To know about dizziness, please click here.)',
    'presyncope' => '(Do you feel presyncope? To know about presyncope, please click here.)',
    'tiredness' => '(Do you feel tired all the time?)',
    'exercise' => '(Do you do exercise regularly?)',
    'other_symptoms' => 'Would you like to share any other symptoms? Please write.',
    'central_nervous_system' => '(Do you have central nervous system (CNS) difficulties? To know about CNS, please click here.)',
    'musculoskeletal' => '(Do you have musculoskeletal (MSK) difficulties? To know about MSK difficulties, please click here.)',
    'gastrointestinal' => '(Do you have gastrointestinal (GI) difficulties? To know about GI difficulties, please click here.)',
    'urogenital_symptoms' => '(Do you have urogenital symptoms (UGS) difficulties? To know about UGS, please click here.)',
    'skin' => '(Do you have skin issues?)',
    'gynae' => '(Do you have gynae difficulties?)',
    'medications' => '(Are you on medications?)',
    'drug_allergies' => 'Do you have any drug allergies? Please write. ',
    'updates' => 'Would you like to share any updates since your last visit? Please write.  ',
    'risk_factors' => '(Please share if you have below habits.)',
    'family_history' => 'Does any of your blood relative has cardiovascular disease? Please write. Otherwise, please write NA.',
    'interventions' => 'Would you like to share any interventions that you underwent? Please write. Otherwise, please write NA.',
    'new_tests' => 'Have you had any new tests since your last visit? Please write. Otherwise, please write NA.',
]



];
