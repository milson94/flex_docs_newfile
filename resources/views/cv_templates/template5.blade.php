<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Vitae - Template 7 (Refined JS Columns - 800px)</title>
    <style>
        /* Resets and General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
             height: 100%;
        }

        body {
            width: 695px; /* Approx A4 width */
            min-height: 1042px; /* Approx A4 height */
            margin: 0 auto;
            padding: 0;

            /* Background Image Fix */
            background-image: url('https://media-hosting.imagekit.io//a82b225067224d06/background_img04.png?Expires=1835469942&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=tHAyiT1LigHrXQ0NMg0f3DYGNRx1coPVbMuu6-43C2rEKeOkfRX0rLhcX9q-DgwmGH7Kclt7IT2OzqRyxQJF33TVLK7kijmGWv5WlS0hEtVAWrAVOrVgzJ~DxNb2Y0rDjIp1CYvshMu0HJgV1Q76XZd6JpAo4d7bRkxvlEYMRM8xKUD2bPMkIU6l9zejz18QcMooGw8gGGhblG4PuAj32rYrTPYsgPbAnzvHuBcbD7LaneEdBuchh51A2IdjlOo5gi9mwB~hUqnVONbZ8O5~pXNEfBsKMHNlLoqTqKb3hO9r03EjcYoJN4g2keajLd9KnbD8yxY4kcyyTxAcRntpdQ__');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;

            font-family: 'human', sans-serif;
            font-weight: 400;
            color: #333;
            font-size: 12px;
            line-height: 1.4;
            position: relative;

            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        /* CV Container - wraps content inside body */
        .cv-container {
            width: 100%;
            min-height: inherit;
            padding: 40px 20px 20px 20px;
            position: relative;
            z-index: 1;
             /* Optional: slightly transparent white bg for content readability */
             background-color: rgba(255, 255, 255, 0.85);
        }

        /* Header Area */
        .cv-header {
            position: relative;
            margin-bottom: 30px;
            padding-top: 10px;
            background-color: transparent;
        }

        .cv-title { text-align: center; color: darkblue; font-size: 28.8px; font-weight: bold; position: absolute; top: -20px; left: 0; right: 0; }
        .name-role-block { text-align: left; }
        .name-role-block h1 { font-size: 24px; font-weight: bold; text-transform: uppercase; margin-bottom: 5px; color: #1e90ff; }
        .name-role-block .role { font-size: 16px; color: #2c3e50; margin-bottom: 15px; }

        /* --- Column Layout using Flexbox --- */
        .columns-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Align items to the top */
            width: 100%;
            background-color: transparent;
        }

        .column {
            flex-basis: calc(50% - 12.5px); /* Width for two columns with a 25px gap */
            max-width: calc(50% - 12.5px);
            padding: 0;
            text-align: left;
            word-wrap: break-word;
        }
        #column-1 { margin-right: 12.5px; }
        #column-2 { margin-left: 12.5px; }

        /* --- REMOVED: column-count CSS --- */

        /* Section Styles */
        .section {
            margin-bottom: 15px;
            page-break-inside: avoid; /* Still useful for print contexts */
            background-color: transparent;
            padding: 0;
            overflow: hidden; /* Helps contain margins */
        }
        /* We will measure direct children of .section too */
        .section > * {
             /* Add margin to direct children if needed, e.g., p, ul, table */
             /* margin-bottom: 5px; */ /* Be careful not to double margins */
        }


        .section__title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            color: #1e90ff;
            border-bottom: 1px solid #1e90ff;
            padding-bottom: 5px;
            text-align: left;
             /* Have margin separate from .section's margin-bottom */
             /* margin-bottom: 8px; */
        }

        /* Content Item Styles */
        .contact-info p,
        .summary p,
        .experience-item p,
        .education-item p,
        .reference-item p,
        .grid-item p {
            margin-top: 0;
            /* Use padding or specific margins instead of generic p margin if needed */
             margin-bottom: 5px;
            font-size: 12px;
            color: #555;
            text-align: justify;
            word-break: break-word;
        }
         .contact-info p { text-align: left; }
         .contact-label { font-weight: bold; margin-right: 5px; color: #333; }

        .experience-item,
        .education-item,
        .reference-item {
            margin-bottom: 10px; /* Space below each item */
            page-break-inside: avoid;
        }

        .experience-item h3,
        .education-item h3,
        .reference-item h3 { font-size: 14px; font-weight: 600; color: #333; margin: 0 0 5px 0; text-align: left; }

        .experience-item ul,
        .grid-item ul,
        .skills-list /* Treat lists as blocks */
         {
             list-style-position: outside;
             padding-left: 18px;
             margin-top: 5px;
             margin-bottom: 5px;
             text-align: justify;
        }
         .experience-item li,
         .grid-item li,
         .skills-list li
         {
            margin-bottom: 3px;
            color: #555;
            page-break-inside: avoid; /* Prevent list items splitting */
         }

        /* Date Style */
        .date { color: #4682b4; font-style: italic; font-size: 11px; }

        /* Skills List (styling moved above) */
        .skills-list { margin-bottom: 10px; }
        .skills-list li { margin-bottom: 5px; font-size: 12px; word-break: break-word; }

        /* Language Table */
        .language-table { width: 100%; border-collapse: collapse; margin: 8px 0; font-size: 11px; page-break-inside: avoid; }
        .language-table th,
        .language-table td { border: 1px solid #ddd; padding: 4px; text-align: center; color: #555; white-space: nowrap; }
        .language-table th { background-color: #f2f2f2; color: #333; font-weight: 600; }

        /* Footer Placeholder */
        .footer { text-align: center; margin-top: 20px; font-size: 10px; color: #888; background-color: transparent; }

    </style>
</head>

<body>
    <div class="cv-container">

        <!-- Header: Title, Name, Role -->
        <div class="cv-header">
            <p class="cv-title">CURRÍCULO VITAE</p>
            <div class="name-role-block">
                <h1>
                    <span>{{ $first_name ?? 'N/A' }}</span>
                    <span>{{ $last_name ?? 'N/A' }}</span>
                </h1>
                <p class="role">{{ $role ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Wrapper for Flexbox Columns -->
        <div class="columns-wrapper">

            <!-- Column 1: Content starts here, JS will move items to Column 2 -->
            <div id="column-1" class="column">

                <!-- Personal Details -->
                <div class="section contact-info">
                    <div class="section__title">Detalhes Pessoais</div>
                    <div> <!-- Wrap content in a div for easier measurement if needed -->
                        <p><span class="contact-label">Nacionalidade:</span> {{ $nationality ?? 'N/A' }}</p>
                        <p><span class="contact-label">Data de Nascimento:</span> {{ $date_of_birth ?? 'N/A' }}</p>
                        <p><span class="contact-label">Local de Nascimento:</span> {{ $place_of_birth ?? 'N/A' }}</p>
                        <p><span class="contact-label">Gênero:</span> {{ $gender == 'male' ? 'Masculino' : ($gender == 'female' ? 'Feminino' : ($gender ?? 'Outro')) }}</p>
                        <p><span class="contact-label">Email:</span> {{ $email ?? 'N/A' }}</p>
                        <p><span class="contact-label">LinkedIn:</span> {{ $linkedin ?? 'N/A' }}</p>
                        <p><span class="contact-label">Celular:</span> {{ $phone_number ?? 'N/A' }}</p>
                        <p><span class="contact-label">Endereço:</span> {{ $location ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Summary -->
                <div class="section summary">
                    <div class="section__title">Resumo</div>
                    <p>{{ $summary ?? 'N/A' }}</p>
                </div>

                <!-- Experience -->
                <div class="section experience-section">
                    <div class="section__title">Experiência Profissional</div>
                    @forelse ($experiences as $experience)
                    <div class="experience-item"> <!-- Measure this block -->
                        <h3>{{ $experience['title'] ?? 'N/A' }} - {{ $experience['company_name'] ?? 'N/A' }}</h3>
                        <p class="date"><em>{{ $experience['start_date'] ?? '?' }} - {{ $experience['current'] ? 'Atual' : ($experience['end_date'] ?? '?') }}</em></p>
                        @if (!empty($experience['company_description']))
                            <p><strong>Descrição da Empresa:</strong> {{ $experience['company_description'] }}</p>
                        @endif
                         @if (!empty($experience['duties']) && is_array($experience['duties']) && count($experience['duties']) > 0 && !empty(array_filter($experience['duties'])[0]))
                            <p><strong>Responsabilidades:</strong></p>
                            <ul>
                                @foreach ($experience['duties'] as $duty)
                                    @if(!empty(trim($duty)))
                                        <li>{{ trim($duty) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @elseif (!empty($experience['duties']) && is_string($experience['duties']))
                            <p><strong>Responsabilidades:</strong> {{ $experience['duties'] }}</p>
                        @endif
                        @if (!empty($experience['achievements']))
                        <p><strong>Conquistas:</strong> {{ $experience['achievements'] }}</p>
                        @endif
                    </div>
                    @empty
                    <p>Nenhuma experiência profissional adicionada.</p>
                    @endforelse
                </div>

                <!-- Education -->
                <div class="section education-section">
                    <div class="section__title">Educação</div>
                    @forelse ($educations as $education)
                    <div class="education-item"> <!-- Measure this block -->
                        <h3>{{ $education['degree'] ?? 'N/A' }} - {{ $education['school'] ?? 'N/A' }}</h3>
                        <p class="date"><em>Ano de Conclusão: {{ $education['year_of_completion'] ?? 'N/A' }}</em></p>
                    </div>
                    @empty
                    <p>Nenhuma educação adicionada.</p>
                    @endforelse
                </div>

                <!-- Skills -->
                <div class="section skills-section">
                    <div class="section__title">Habilidades</div>
                     @if (!empty($skills))
                        <ul class="skills-list"> <!-- Measure this block -->
                            @php
                                $skillItems = [];
                                if (is_string($skills)) {
                                    $skillItems = array_map('trim', explode(',', $skills));
                                } elseif (is_array($skills)) {
                                    $skillItems = array_map('trim', $skills);
                                }
                                $skillItems = array_filter($skillItems);
                            @endphp
                            @foreach ($skillItems as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Nenhuma habilidade adicionada.</p>
                    @endif
                </div>

                <!-- Languages -->
                <div class="section languages-section">
                    <div class="section__title">Idiomas</div>
                    @if (!empty($languages) && is_array($languages) && count($languages) > 0)
                    <table class="language-table"> <!-- Measure this block -->
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
                    <p>Nenhum idioma adicionado.</p>
                    @endif
                </div>

                <!-- References -->
                <div class="section reference-section">
                    <div class="section__title">Referências</div>
                    @forelse ($references as $reference)
                    <div class="reference-item"> <!-- Measure this block -->
                        <h3>{{ $reference['reference_name'] ?? 'N/A' }}</h3>
                        @if (!empty($reference['reference_position']))
                             <p><strong>Cargo:</strong> {{ $reference['reference_position'] }}</p>
                        @endif
                        @if (!empty($reference['reference_phone']))
                            <p><strong>Telefone:</strong> {{ $reference['reference_phone'] }}</p>
                        @endif
                     </div>
                    @empty
                    <p>Referências disponíveis mediante solicitação.</p>
                    @endforelse
                </div>

                <!-- Additional Information -->
                <div class="section additional-information-section">
                    <div class="section__title">Informações Adicionais</div>
                    <div class="grid-item"> <!-- Measure this block -->
                        @if (!empty($additional_information) && is_array($additional_information) && count($additional_information) > 0 && !empty(array_filter($additional_information)[0]))
                            <ul>
                                @foreach ($additional_information as $info)
                                    @if(!empty(trim($info)))
                                        <li>{{ trim($info) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p>Nenhuma informação adicional fornecida.</p>
                        @endif
                    </div>
                </div>

            </div> <!-- End Column 1 -->

            <!-- Column 2: Initially empty, JS will move items here -->
            <div id="column-2" class="column">
            </div> <!-- End Column 2 -->

        </div> <!-- End Columns Wrapper -->

        <div class="footer">
            <!-- Footer content -->
        </div>
    </div> <!-- End CV Container -->

    <!-- JavaScript for Refined Column Balancing -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- CONFIGURATION ---
            const columnBreakHeight = 800; // Target minimum height for column 1
            // --- END CONFIGURATION ---

            const column1 = document.getElementById('column-1');
            const column2 = document.getElementById('column-2');

            if (!column1 || !column2) {
                console.warn('Column elements not found.');
                return;
            }

            // Get all significant renderable block elements within column 1
            // This includes section titles, paragraphs, lists, tables, and specific items
            const elementsToMeasure = Array.from(column1.querySelectorAll(
                '.section > .section__title, .section > p, .section > ul, .section > table, .experience-item, .education-item, .reference-item, .grid-item'
             ));

             // Filter out elements that might be hidden or irrelevant if necessary
             // elementsToMeasure = elementsToMeasure.filter(el => el.offsetParent !== null);


            if (elementsToMeasure.length === 0) {
                console.warn('No significant elements found in column 1 to measure.');
                return;
            }

            let currentHeight = 0;
            let breakElementIndex = -1; // Index of the FIRST element to move to column 2

            console.log(`Found ${elementsToMeasure.length} elements to measure.`);

            // Calculate heights and find the break point element
            for (let i = 0; i < elementsToMeasure.length; i++) {
                const element = elementsToMeasure[i];
                const styles = window.getComputedStyle(element);
                const marginTop = parseFloat(styles.marginTop) || 0;
                const marginBottom = parseFloat(styles.marginBottom) || 0;
                const elementHeight = element.offsetHeight; // Height + padding + border

                // Skip elements with no height (e.g., empty paragraphs potentially)
                if (elementHeight <= 0 && marginTop <= 0 && marginBottom <= 0) {
                    console.log(`Skipping element index ${i} (zero height/margin):`, element.tagName, element.classList);
                    continue;
                }

                const elementTotalSpace = elementHeight + marginTop + marginBottom;
                const previousHeight = currentHeight;
                currentHeight += elementTotalSpace;

                console.log(`Element ${i} (${element.tagName}.${element.classList[0] || ''}): Space=${elementTotalSpace.toFixed(1)}px, Cumulative Height=${currentHeight.toFixed(1)}px`);

                // If the *top* of this element is already past the break height,
                // it definitely belongs in column 2.
                // OR if adding this element *crosses* the threshold.
                if (previousHeight >= columnBreakHeight || (currentHeight > columnBreakHeight && previousHeight < columnBreakHeight)) {
                     // We want to move THIS element (and subsequent ones)
                     if (breakElementIndex === -1) { // Mark only the first element that should move
                        breakElementIndex = i;
                        console.log(`---> Threshold (${columnBreakHeight}px) crossed or met starting at element index ${i}. This element will move.`);
                     }
                }
            }

            // Move elements if a break point was determined
            if (breakElementIndex !== -1) {
                // Get all elements from the break index to the end
                const elementsToMove = elementsToMeasure.slice(breakElementIndex);

                if (elementsToMove.length > 0) {
                    console.log(`Moving ${elementsToMove.length} elements (starting from index ${breakElementIndex}) to column 2.`);
                    elementsToMove.forEach(element => {
                        // IMPORTANT: We need to move the element itself. If it's nested inside a .section
                        // that *isn't* moving, this logic might need adjustment.
                        // Assuming the querySelectorAll got the primary blocks correctly...
                         if (element.parentElement === column1) {
                             column2.appendChild(element); // Directly move if it's a direct child (unlikely)
                         } else {
                            // If the element is nested (e.g. ul inside .section), move its containing section
                            // if that section hasn't already been processed.
                            // This gets complex. Let's simplify: Move the *section* containing the breakElement.
                            let sectionToMove = element.closest('.section');

                            // Find the index of this section within the *original* full list of sections in col1
                             let allSectionsInCol1 = Array.from(column1.querySelectorAll('.section'));
                             let sectionIndexToMove = allSectionsInCol1.findIndex(sec => sec === sectionToMove);

                             if (sectionIndexToMove !== -1) {
                                console.log(`Identified section at index ${sectionIndexToMove} to move based on crossing element ${breakElementIndex}.`);
                                let sectionsInOrderToMove = allSectionsInCol1.slice(sectionIndexToMove);
                                console.log(`Moving ${sectionsInOrderToMove.length} sections starting from section index ${sectionIndexToMove}`);
                                sectionsInOrderToMove.forEach(sec => {
                                    column2.appendChild(sec);
                                });
                                // Break the outer loop once we've moved the necessary sections
                                break; // Exit the for loop as we've done the move based on the first crossing element
                             } else {
                                console.error("Could not find the parent section to move for element:", element);
                             }
                         }
                    });
                } else {
                     console.log(`Threshold crossed at element index ${breakElementIndex}, but no subsequent elements found to move.`);
                }

            } else {
                 console.log(`Content height (${currentHeight.toFixed(1)}px) did not reach threshold (${columnBreakHeight}px) requiring a move.`);
            }
        });
    </script>

</body>
</html>