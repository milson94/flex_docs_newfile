<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Vitae</title>
    <style>
        /* Resets and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            width: 595px;
            /* A4 width at 72 DPI */
            height: 842px;
            /* A4 height at 72 DPI */
            margin: 0 auto;
            /* Center the body horizontally */
            background: url('https://media-hosting.imagekit.io//a82b225067224d06/background_img04.png?Expires=1835469942&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=tHAyiT1LigHrXQ0NMg0f3DYGNRx1coPVbMuu6-43C2rEKeOkfRX0rLhcX9q-DgwmGH7Kclt7IT2OzqRyxQJF33TVLK7kijmGWv5WlS0hEtVAWrAVOrVgzJ~DxNb2Y0rDjIp1CYvshMu0HJgV1Q76XZd6JpAo4d7bRkxvlEYMRM8xKUD2bPMkIU6l9zejz18QcMooGw8gGGhblG4PuAj32rYrTPYsgPbAnzvHuBcbD7LaneEdBuchh51A2IdjlOo5gi9mwB~hUqnVONbZ8O5~pXNEfBsKMHNlLoqTqKb3hO9r03EjcYoJN4g2keajLd9KnbD8yxY4kcyyTxAcRntpdQ__') no-repeat;
            background-size: 100% 100%;
            font-family: 'Arial', sans-serif;
            font-weight: 400;
            color: #333;
            font-size: 12px;
            line-height: 14px;
            position: relative;
        }

        .cv-container {
            width: 100%;
            /* Occupy the full width of the body */
            height: 100%;
            /* Occupy the full height of the body */
            position: relative;
            top: 20px;
            left: 0;
            z-index: 1;
            display: block;
            border: 1px solid green;
            /*  removed borders as unnecesary */
        }

        /* Style the main table */
        .cv-table {
            width: 100%;
            margin: 70px auto;  /* You can leave this or make a 120,120 */
            /* Lowered top margin to push content down */
            /* Center the table */
            border-collapse: separate;
            /* Enable border spacing */
            border-spacing: 0;
            table-layout: fixed;
            /* Ensure consistent column widths */
            position: relative;
            /* Remove absolute and transform */
            top: 0;
            left: 0;
            transform: none;
        }

        /* Style the header row */
        .header-row {
            text-align: center;
            padding-bottom: 20px;
            /* Increased padding */
            /* border: 1px solid orange; REMOVE LATER */
        }

        /* Style the two-column rows */
        .two-column-row {
            vertical-align: top;
            /* Align content to the top of the cells */
            /* border: 1px solid purple; REMOVE LATER */
        }

        .two-column-row td {
            width: 55%;
            /* Adjusted to use all possible space */
            /* Equal width columns */
            padding: 15px;
            /* More generous padding */
            /* border: 1px solid red; REMOVE LATER */
        }

        /* gap size of table columns */
        .two-column-row td:first-child {
            padding-right: 7%;
            /* 50px; Adjust for desired gap.  Half the space*/
        }

        .two-column-row td:last-child {
            padding-left: 7%;
            /* 50px; Adjust for desired gap. Half the space */
        }

        /* Style the header content */
        .header-content {
            width: 100%;
        }

        .header-content h1 {
            font-size: 22px;
            /* Larger header */
            font-weight: 700;
            text-transform: uppercase;
            color: #1e90ff;
            margin-bottom: 4px;
        }

        .header-content p {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
        }

        /* Section Styles */
        .section {
            margin-bottom: 15px;
            /* More margin */
            page-break-inside: avoid;
            background-color: transparent;
            padding: 0;
            /* border: 1px dashed gray; REMOVE LATER */
        }

        .contact-info p,
        .summary p {
            margin: 5px auto;
            font-size: 14px;
            /* Larger font */
            color: #555;
            max-width: 98%;
            text-align: justify;
        }

        .section__title {
            font-size: 16px;
            /* Larger Title */
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            color: #1e90ff;
            text-align: left;
            border-bottom: 1px solid #1e90ff;
            padding-bottom: 5px;
        }

        .experience-item,
        .education-item,
        .reference-item {
            margin-bottom: 10px;
            /* More Space*/
            page-break-inside: avoid;
        }

        .experience-item h3,
        .education-item h3,
        .reference-item h3 {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin: 0 auto 5px;
            text-align: left;
        }

        .experience-item p,
        .education-item p,
        .reference-item p {
            margin: 5px auto;
            font-size: 12px;
            color: #555;
            max-width: 98%;
            text-align: justify;
        }

        .date {
            color: #4682b4;
            font-style: italic;
        }

        .skills-list,
        .languages-list {
            list-style: none;
            margin-bottom: 10px;
            /* More Space*/
            margin-left: 0;
            text-align: left;
        }

        .skills-list li,
        .languages-list li {
            margin-bottom: 5px;
            font-size: 12px;
            color: #555;
            text-align: left;
            /* border: 1px dotted black; REMOVE LATER */
        }

        .language-table {
            width: 98%;
            border-collapse: collapse;
            margin: 8px auto;
            font-size: 12px;
        }

        .language-table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: 600;
            white-space: nowrap;
            padding: 5px;
            text-align: center;
            /* added to try to fix the language table */
        }

        .language-table td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
            color: #555;
            white-space: nowrap;
            /* added to try to fix the language table */
            overflow: hidden;
            /* added to try to fix the language table */
            text-overflow: ellipsis;
            /* added to try to fix the language table */
        }

        /* Footer Styles */
        .footer {
            width: 100%;
            text-align: center;
            font-size: 10px;
            /* Smaller footer */
            color: #777;
            margin-top: 20px;
            /* More Space*/
            border-top: 1px solid #ddd;
            padding-top: 8px;
            max-width: 555px;
            /* border: 1px solid teal; REMOVE LATER */
        }

        /* Grid Item Styles */
        .grid-item {
            background-color: transparent;
            padding: 10px;
            /* ADDING PADDING HERE */
            color: #333;
            /* border: 1px solid brown; REMOVE LATER */
        }

        .grid-item .section__title {
            text-align: left;
        }

        .grid-item p,
        .grid-item ul {
            text-align: justify;
            margin-left: auto;
            margin-right: auto;
            max-width: 98%;
            color: #555;
            /* border: 1px dashed olive; REMOVE LATER */
        }

        .grid-item li {
            color: #555;
            text-align: left;
            /* word-break */
        }

        .meu_titulo {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            position: relative; /* Make it relative */
            top: 60px;  /* Push it 60px down */
        }
    </style>
</head>

<body>
    <div class="cv-container">
  

  
      <!-- Header Row -->
    <p  class="meu_titulo">CURRÍCULO VITAE</p>
 <table class="cv-table">
            <tr>
   
                  <td colspan="2" class="header-row">
                     <div class="header-content">
                        <h1>
                             <span class="first-name">{{ $first_name ?? 'N/A' }}</span>
                          <span class="last-name">{{ $last_name ?? 'N/A' }}</span>
                                      </h1>
                                     <p>{{ $role ?? 'N/A' }}</p>
                     </div>
                  </td>
      </tr>

            <!-- Two-Column Row -->
            <tr class="two-column-row">
                <td>
                    <!-- Left Column Content -->
                  
                    <div class="section">
                        <div class="section__title">Detalhes Pessoais</div>
                        <div class="contact-info">
                            <p>Nacionalidade: {{ $nationality ?? 'N/A' }}</p>
                            <p>Data de Nascimento: {{ $date_of_birth ?? 'N/A' }}</p>
                            <p>Local de Nascimento: {{ $place_of_birth ?? 'N/A' }}</p>
                            <p>Gênero: {{ $gender == 'male' ? 'Masculino' : ($gender == 'female' ? 'Feminino' : ($gender ?? 'Outro')) }}</p>
                            <p>{{ $email ?? 'N/A' }}</p>
                            <p>{{ $linkedin ?? 'N/A' }}</p>
                            <p>{{ $phone_number ?? 'N/A' }}</p>
                            <p>{{ $location ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <!-- Resumo -->
                    <div class="section summary-section">
                        <div class="section__title">Resumo</div>
                        <p>{{ $summary ?? 'N/A' }}</p>
                    </div>

                   <!-- Educação -->
                   
                     <div class="section education-section">
                        <div class="section__title">Educação</div>
                        @if (!empty($educations) && is_array($educations))
                            @foreach ($educations as $education)
                                <div class="education-item">
                                    <h3>{{ $education['degree'] ?? 'N/A' }} - {{ $education['school'] ?? 'N/A' }}</h3>
                                    <p class="date"><em>Ano de Conclusão: {{ $education['year_of_completion'] ?? 'N/A' }}</em></p>
                                </div>
                            @endforeach
                        @else
                            <p>Sem educação adicionada.</p>
                        @endif
                    
                </td>
                <td>
                
        


                   

                    <!-- Referências -->
           
                    <div class="grid-item">
                        <div class="section__title">Referências</div>
                                 @if (!empty($references) && is_array($references))
                                    @foreach ($references as $reference)
                                        <div class="reference-item">
                                            <h3>{{ $reference['reference_name'] ?? 'N/A' }}</h3>
                                            <p>Cargo: {{ $reference['reference_position'] ?? 'N/A' }}</p>
                                            <p>Telefone: {{ $reference['reference_phone'] ?? 'N/A' }}</p>
                                            </div>
                                            @endforeach
                            @else
                                <p>Sem referências adicionadas.</p>
                    @endif
                     
                  
                    
    </div>
    <!-- Referências -->

 </div>
 
          <!-- Footer -->
     
          <!-- Idiomas -->
                     
        <div class="section">
                        <div class="section__title">Idiomas</div>
                      
                        @if (!empty($languages) && is_array($languages))
                                            <table class="language-table">
                                <thead>
                                    <tr>
                                        <th>Idioma</th>
                                        <th>Conversação</th>
                                        <th>Leitura</th>
                                        <th>Escrita</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($languages as $language)
                                        <tr>
                                            <td>{{ $language['language'] ?? 'N/A' }}</td>
                                            <td>{{ $language['speaking_level'] == 'basic' ? 'Básico' : ($language['speaking_level'] == 'good' ? 'Bom' : ($language['speaking_level'] == 'fluent' ? 'Fluente' : 'N/A')) }}</td>
                                            <td>{{ $language['reading_level'] == 'basic' ? 'Básico' : ($language['reading_level'] == 'good' ? 'Bom' : ($language['reading_level'] == 'fluent' ? 'Fluente' : 'N/A')) }}</td>
                                            <td>{{ $language['writing_level'] == 'basic' ? 'Básico' : ($language['writing_level'] == 'good' ? 'Bom' : ($language['writing_level'] == 'fluent' ? 'Fluente' : 'N/A')) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                           <p>Sem idiomas adicionados.</p>
                        @endif
         
                       

               
                                        
                      
        </div>
    
           
    </div>
    <!-- Habilidades -->
        
      <div class="section">
                        <div class="section__title">Habilidades</div>
                                  <ul class="skills-list">
                                    @if (!empty($skills) && (is_array($skills) || is_string($skills)))
                                        @foreach (is_array($skills) ? $skills : (is_string($skills) ? explode(',', $skills) : []) as $skill)
                                            @if (!empty(trim($skill)))
                                                <li>{{ trim($skill) }}</li>
                                         @endif
                                @endforeach
                            @else
                                <p>Sem habilidades adicionadas.</p>
                            @endif
                         </ul>
                  </div>
    
    </td>
            </tr>

              <!--Informações Adicionais and Footer Row-->
                    <!-- Informações Adicionais -->
              

       <!-- Footer -->
     

        </table>
    </div>
       <!-- Experiência -->
     <div class="section">
                        <div class="section__title">Experiência</div>
                        @if (!empty($experiences) && is_array($experiences))
                            @foreach ($experiences as $experience)
                                <div class="experience-item">
                                    <h3>{{ $experience['title'] ?? 'N/A' }} - {{ $experience['company_name'] ?? 'N/A' }}</h3>
                                    <p class="date"><em>{{ $experience['start_date'] ?? 'N/A' }} - {{ $experience['end_date'] ?? 'Atual' }}</em></p>
                                    @if (!empty($experience['company_description']))
                                        <p>Descrição da Empresa: {{ $experience['company_description'] }}</p>
                                    @endif
                                    @if (!empty($experience['achievements']))
                                        <p>Conquistas: {{ $experience['achievements'] }}</p>
                                    @endif
                                    @if (!empty($experience['duties']) && (is_array($experience['duties']) || is_string($experience['duties'])))
                                        <p>Responsabilidades:</p>
                                        <ul>
                                            @foreach (is_array($experience['duties']) ? $experience['duties'] : (is_string($experience['duties']) ? explode(',', $experience['duties']) : []) as $duty)
                                                @if (!empty(trim($duty)))
                                                    <li>{{ trim($duty) }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p>Sem experiência adicionada.</p>
                        @endif
            

        </div>
  
         
</div>
 <!--Informações Adicionais and Footer Row-->

              
                    <!-- Informações Adicionais -->
                    <div class="section">
 <div class="section__title">Informações Adicionais</div>
                        
                        @if (!empty($additional_information) && is_array($additional_information))
                            <ul>
                                @foreach ($additional_information as $info)
                                     
                    <li style="word-break: break-word;">{{ trim($info) }}</li>
                 
                                        @endforeach
                            </ul>
                        @else
                            <p>Sem informações adicionais.</p>
                        @endif
</div>
   
         <!-- Footer -->
         

</body>

</html>