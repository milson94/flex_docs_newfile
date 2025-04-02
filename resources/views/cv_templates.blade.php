{{-- resources/views/cv_templates.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="container mx-auto">

        {{-- Show title based on flow --}}
        @if(session('needs_template_selection'))
             <h1 class="text-3xl font-bold text-yellow-700 mb-4">Quase lá! Escolha um Modelo</h1>
             <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8" role="alert">
                <p>Os seus dados foram guardados temporariamente. Agora, selecione o modelo abaixo que deseja usar para gerar o seu CV.</p>
            </div>
        @else
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Escolha um Modelo para Começar</h1>
             <p class="text-gray-600 mb-6 italic">Dica: Pode escolher um modelo primeiro ou clicar em "Criar CV" no menu para preencher os dados antes.</p>
        @endif


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse ($templates as $templateName)
                @php
                    $templateNumber = str_replace('template', '', $templateName);
                    $templateImage = asset("images/templates/template{$templateNumber}.png"); // Assuming images are in public/images/templates
                    $templateTitle = 'Modelo ' . $templateNumber;
                @endphp

                <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col justify-between transition transform hover:scale-105 duration-300">
                    <div>
                        <img src="{{ $templateImage }}" alt="{{ $templateTitle }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';" class="w-full h-52 object-contain mb-4 rounded border bg-gray-50">
                        {{-- Fallback text if image fails --}}
                        <div style="display:none;" class="w-full h-52 flex items-center justify-center bg-gray-200 text-gray-500 rounded mb-4">Sem pré-visualização</div>

                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $templateTitle }}</h2>
                    </div>
                    <div class="space-y-2 mt-4">
                        {{-- Conditional Action Button/Form --}}
                        @if(session('needs_template_selection'))
                            <form action="{{ route('cv.generate_with_data', ['templateName' => $templateName]) }}" method="POST" class="block">
                                 @csrf
                                 <button type="submit" class="w-full bg-purple-600 text-white text-center px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-300 font-medium">
                                     Usar {{ $templateTitle }}
                                 </button>
                             </form>
                        @else
                            <a href="{{ route('home') }}?template={{ $templateName }}"
                               class="block bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium">
                                Escolher Modelo
                            </a>
                        @endif

                         {{-- Preview Button --}}
                        <button
                            onclick="showPreview('{{ $templateImage }}')"
                            class="block w-full bg-teal-custom text-black text-center px-4 py-2 rounded-lg hover:bg-teal-dark transition duration-300 font-medium">
                            Ver Pré-visualização
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10">
                     <p class="text-xl text-gray-500">Nenhum template encontrado.</p>
                     @if(!session('needs_template_selection'))
                        <p class="mt-4">
                            <a href="{{ route('home') }}" class="text-blue-600 hover:underline font-semibold">Pode preencher o formulário diretamente clicando aqui.</a>
                        </p>
                    @endif
                </div>
            @endforelse
        </div>
    </div>

    <!-- Preview Modal -->
    <div id="previewModal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50 p-4 transition-opacity duration-300" style="backdrop-filter: blur(5px);">
        {{-- Modal Content Box - Made smaller again on desktop --}}
        {{-- Changed lg:w-2/3 to lg:w-3/5, max-w-3xl to max-w-2xl, lg:max-h-[85vh] to lg:max-h-[70vh] --}}
        <div class="bg-white p-5 rounded-lg w-11/12 lg:w-3/5 max-w-2xl max-h-[95vh] lg:max-h-[70vh] overflow-auto relative shadow-2xl">
             <button onclick="closePreview()" title="Fechar (Esc)" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-4xl font-light z-10 leading-none">×</button>
             {{-- Image max-height reduced for desktop: lg:max-h-[65vh] --}}
            <img id="previewImage" src="" alt="CV Preview" class="block w-full h-auto max-h-[88vh] lg:max-h-[65vh] object-contain">
        </div>
    </div>
</div>

{{-- Styles and Scripts remain the same --}}
<style>
    .bg-teal-custom { background-color: #34ebba; color: black; }
    .bg-teal-dark:hover { background-color: #2cd9a8; }
    .transition { transition: all 0.3s ease; }
    #previewModal { opacity: 0; pointer-events: none; } /* Hidden by default */
    #previewModal.flex { opacity: 1; pointer-events: auto; } /* Visible */
</style>

<script>
    const previewModal = document.getElementById('previewModal');
    const previewImage = document.getElementById('previewImage');

    function showPreview(imageUrl) {
        previewImage.src = imageUrl;
        previewModal.classList.remove('hidden'); // Use opacity/pointer-events for transition
        previewModal.classList.add('flex');
    }

    function closePreview() {
        previewModal.classList.remove('flex');
        previewModal.classList.add('hidden'); // Or use opacity/pointer-events
        previewImage.src = ''; // Clear src
    }

    previewModal.addEventListener('click', function(e) {
        if (e.target === previewModal) {
            closePreview();
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape" && previewModal.classList.contains('flex')) {
            closePreview();
        }
    });
</script>
@endsection