@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar (Hidden on Mobile) -->
    <div class="w-64 bg-white shadow-lg hidden md:block">
        @include('partials.sidebar')
    </div>

    {{-- Removed Form Filler Section --}}

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Preencha os Detalhes do Seu CV</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- CV Form -->
        <form method="POST" action="{{ route('cv.preview') }}" class="bg-white p-8 rounded-lg shadow-lg">
            @csrf

            <!-- Hidden Input for Template -->
            <input type="hidden" name="template" value="{{ request()->query('template') }}">

            <!-- Personal Details -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Detalhes Pessoais</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">Primeiro Nome</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu primeiro nome"
                            value="João" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Sobrenome</label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu sobrenome"
                            value="Silva" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Cargo que está se candidatando</label>
                        <input
                            type="text"
                            id="role"
                            name="role"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite o cargo"
                            value="Desenvolvedor Web Sênior" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu email"
                            value="joao.silva@email.com" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="linkedin" class="block text-gray-700 text-sm font-bold mb-2">LinkedIn/Portfólio</label>
                        <input
                            type="text"
                            id="linkedin"
                            name="linkedin"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu LinkedIn ou link do portfólio"
                            value="linkedin.com/in/joaosilvadev" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Localização</label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite sua localização"
                            value="Lisboa, Portugal" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="place_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Local de Nascimento</label>
                        <input
                            type="text"
                            id="place_of_birth"
                            name="place_of_birth"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu local de nascimento"
                            value="Porto, Portugal" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="nationality" class="block text-gray-700 text-sm font-bold mb-2">Nacionalidade</label>
                        <input
                            type="text"
                            id="nationality"
                            name="nationality"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite sua nacionalidade"
                            value="Portuguesa" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
                        <input
                            type="text"
                            id="phone_number"
                            name="phone_number"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite seu número de telefone"
                            value="+351 912 345 678" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="date_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento</label>
                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            value="1990-05-15" {{-- Pre-filled --}}
                        >
                    </div>
                    <div>
                        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gênero</label>
                        <select
                            id="gender"
                            name="gender"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        >
                            <option value="">Selecione</option>
                            <option value="male" selected>Masculino</option> {{-- Pre-filled --}}
                            <option value="female">Feminino</option>
                            <option value="other">Outro</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Summary -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Resumo</h2>
                <textarea
                    id="summary"
                    name="summary"
                    rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Explique por que você é a pessoa ideal para o cargo"
                >Desenvolvedor Web Full-Stack altamente motivado e experiente, com mais de 8 anos de experiência na criação e manutenção de aplicações web robustas e escaláveis. Proficiente em PHP (Laravel), JavaScript (Vue.js, React), Node.js e bancos de dados SQL/NoSQL. Apaixonado por resolver problemas complexos e entregar soluções de alta qualidade. Buscando uma oportunidade desafiadora para aplicar minhas habilidades e contribuir para o sucesso da equipe.</textarea> {{-- Pre-filled --}}
            </div>

            <!-- Experience -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Experiência</h2>
                <div id="experience-fields" class="space-y-6">
                    <!-- Pre-filled Experience 1 -->
                    <div class="bg-gray-50 p-6 rounded-lg experience-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nome da Empresa</label>
                                <input
                                    type="text"
                                    name="experience[0][company_name]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o nome da empresa"
                                    value="Tech Solutions Lda" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Cargo</label>
                                <input
                                    type="text"
                                    name="experience[0][title]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite seu cargo"
                                    value="Desenvolvedor Web Sênior" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Início</label>
                                <input
                                    type="date"
                                    name="experience[0][start_date]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    value="2018-03-01" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Término</label>
                                <input
                                    type="date"
                                    name="experience[0][end_date]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 end-date-input"
                                    value="" {{-- Pre-filled (current job) --}}
                                    disabled {{-- Pre-filled (current job) --}}
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="experience[0][current]"
                                    value="1"
                                    class="mr-2 h-4 w-4 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 current-job-checkbox"
                                    checked {{-- Pre-filled --}}
                                >
                                <label class="text-gray-700 text-sm font-bold">Atual</label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Descrição da Empresa</label>
                            <textarea
                                name="experience[0][company_description]"
                                rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Descreva a empresa"
                            >Empresa líder em desenvolvimento de software personalizado para o setor financeiro.</textarea> {{-- Pre-filled --}}
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Principais Conquistas</label>
                            <textarea
                                name="experience[0][achievements]"
                                rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Descreva suas conquistas"
                            >Liderei o desenvolvimento de um novo portal do cliente, resultando em um aumento de 25% na satisfação do cliente. Otimizei consultas de banco de dados, reduzindo o tempo de carregamento da página em 40%.</textarea> {{-- Pre-filled --}}
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Principais Responsabilidades</label>
                            <div class="duties-fields space-y-2">
                                <!-- Pre-filled Duties -->
                                <div class="flex items-center space-x-2 duty-field">
                                    <input
                                        type="text"
                                        name="experience[0][duties][]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                        placeholder="Digite uma responsabilidade"
                                        value="Desenvolvimento e manutenção de aplicações web usando Laravel e Vue.js" {{-- Pre-filled --}}
                                    >
                                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>
                                </div>
                                <div class="flex items-center space-x-2 duty-field">
                                    <input
                                        type="text"
                                        name="experience[0][duties][]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                        placeholder="Digite uma responsabilidade"
                                        value="Colaboração com equipes de design e produto para definir novas funcionalidades" {{-- Pre-filled --}}
                                    >
                                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>
                                </div>
                                <div class="flex items-center space-x-2 duty-field">
                                    <input
                                        type="text"
                                        name="experience[0][duties][]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                        placeholder="Digite uma responsabilidade"
                                        value="Mentoria de desenvolvedores juniores" {{-- Pre-filled --}}
                                    >
                                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>
                                </div>
                            </div>
                            <div class="mt-2 flex justify-start">
                                <button
                                    type="button"
                                    class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 add-duty text-sm"
                                >
                                    Adicionar Responsabilidade
                                </button>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-experience text-sm"
                            >
                                Remover Experiência
                            </button>
                        </div>
                    </div>
                    <!-- Pre-filled Experience 2 -->
                    <div class="bg-gray-50 p-6 rounded-lg experience-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nome da Empresa</label>
                                <input
                                    type="text"
                                    name="experience[1][company_name]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o nome da empresa"
                                    value="Web Agency XPTO" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Cargo</label>
                                <input
                                    type="text"
                                    name="experience[1][title]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite seu cargo"
                                    value="Desenvolvedor Web Pleno" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Início</label>
                                <input
                                    type="date"
                                    name="experience[1][start_date]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    value="2015-06-01" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Data de Término</label>
                                <input
                                    type="date"
                                    name="experience[1][end_date]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 end-date-input"
                                    value="2018-02-28" {{-- Pre-filled --}}
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="experience[1][current]"
                                    value="1"
                                    class="mr-2 h-4 w-4 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 current-job-checkbox"
                                    {{-- Not checked --}}
                                >
                                <label class="text-gray-700 text-sm font-bold">Atual</label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Descrição da Empresa</label>
                            <textarea
                                name="experience[1][company_description]"
                                rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Descreva a empresa"
                            >Agência digital focada em criar websites e aplicações para pequenas e médias empresas.</textarea> {{-- Pre-filled --}}
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Principais Conquistas</label>
                            <textarea
                                name="experience[1][achievements]"
                                rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                placeholder="Descreva suas conquistas"
                            >Desenvolvi mais de 15 websites de clientes usando WordPress e PHP. Implementei soluções de e-commerce usando WooCommerce.</textarea> {{-- Pre-filled --}}
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Principais Responsabilidades</label>
                            <div class="duties-fields space-y-2">
                                <!-- Pre-filled Duties -->
                                <div class="flex items-center space-x-2 duty-field">
                                    <input
                                        type="text"
                                        name="experience[1][duties][]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                        placeholder="Digite uma responsabilidade"
                                        value="Desenvolvimento front-end e back-end para projetos de clientes" {{-- Pre-filled --}}
                                    >
                                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>
                                </div>
                                <div class="flex items-center space-x-2 duty-field">
                                    <input
                                        type="text"
                                        name="experience[1][duties][]"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                        placeholder="Digite uma responsabilidade"
                                        value="Comunicação com clientes para levantamento de requisitos" {{-- Pre-filled --}}
                                    >
                                    <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>
                                </div>
                            </div>
                            <div class="mt-2 flex justify-start">
                                <button
                                    type="button"
                                    class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 add-duty text-sm"
                                >
                                    Adicionar Responsabilidade
                                </button>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-experience text-sm"
                            >
                                Remover Experiência
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Experience Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-experience"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Experiência
                    </button>
                </div>
            </div>

            <!-- Education -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Educação</h2>
                <div id="education-fields" class="space-y-6">
                    <!-- Pre-filled Education -->
                    <div class="bg-gray-50 p-6 rounded-lg education-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Escola/Universidade</label>
                                <input
                                    type="text"
                                    name="education[0][school]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o nome da instituição"
                                    value="Universidade do Porto" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Grau e Área de Estudo</label>
                                <input
                                    type="text"
                                    name="education[0][degree]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite seu grau e área de estudo"
                                    value="Licenciatura em Engenharia Informática" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Ano de Conclusão</label>
                                <select
                                    name="education[0][year_of_completion]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    @for ($year = date('Y'); $year >= 1950; $year--)
                                        <option value="{{ $year }}" {{ $year == 2015 ? 'selected' : '' }}>{{ $year }}</option> {{-- Pre-filled --}}
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-education text-sm"
                            >
                                Remover Educação
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Education Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-education"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Educação
                    </button>
                </div>
            </div>

            <!-- Languages -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Idiomas</h2>
                <div id="language-fields" class="space-y-6">
                    <!-- Pre-filled Language 1 -->
                    <div class="bg-gray-50 p-6 rounded-lg language-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Idioma</label>
                                <input
                                    type="text"
                                    name="languages[0][language]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o idioma"
                                    value="Português" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Conversação</label>
                                <select
                                    name="languages[0][speaking_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    <option value="basic">Básico</option>
                                    <option value="good">Bom</option>
                                    <option value="fluent" selected>Fluente</option> {{-- Pre-filled --}}
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Leitura</label>
                                <select
                                    name="languages[0][reading_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic">Básico</option>
                                    <option value="good">Bom</option>
                                    <option value="fluent" selected>Fluente</option> {{-- Pre-filled --}}
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Escrita</label>
                                <select
                                    name="languages[0][writing_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic">Básico</option>
                                    <option value="good">Bom</option>
                                    <option value="fluent" selected>Fluente</option> {{-- Pre-filled --}}
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-language text-sm"
                            >
                                Remover Idioma
                            </button>
                        </div>
                    </div>
                     <!-- Pre-filled Language 2 -->
                     <div class="bg-gray-50 p-6 rounded-lg language-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Idioma</label>
                                <input
                                    type="text"
                                    name="languages[1][language]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o idioma"
                                    value="Inglês" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Conversação</label>
                                <select
                                    name="languages[1][speaking_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    <option value="basic">Básico</option>
                                    <option value="good" selected>Bom</option> {{-- Pre-filled --}}
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Leitura</label>
                                <select
                                    name="languages[1][reading_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic">Básico</option>
                                    <option value="good">Bom</option>
                                    <option value="fluent" selected>Fluente</option> {{-- Pre-filled --}}
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Escrita</label>
                                <select
                                    name="languages[1][writing_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic">Básico</option>
                                    <option value="good" selected>Bom</option> {{-- Pre-filled --}}
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-language text-sm"
                            >
                                Remover Idioma
                            </button>
                        </div>
                    </div>
                     <!-- Pre-filled Language 3 -->
                    <div class="bg-gray-50 p-6 rounded-lg language-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Idioma</label>
                                <input
                                    type="text"
                                    name="languages[2][language]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o idioma"
                                    value="Espanhol" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Conversação</label>
                                <select
                                    name="languages[2][speaking_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    <option value="basic" selected>Básico</option> {{-- Pre-filled --}}
                                    <option value="good">Bom</option>
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Leitura</label>
                                <select
                                    name="languages[2][reading_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic">Básico</option>
                                    <option value="good" selected>Bom</option> {{-- Pre-filled --}}
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Escrita</label>
                                <select
                                    name="languages[2][writing_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic" selected>Básico</option> {{-- Pre-filled --}}
                                    <option value="good">Bom</option>
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-language text-sm"
                            >
                                Remover Idioma
                            </button>
                        </div>
                    </div>
                     <!-- Pre-filled Language 4 -->
                    <div class="bg-gray-50 p-6 rounded-lg language-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Idioma</label>
                                <input
                                    type="text"
                                    name="languages[3][language]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o idioma"
                                    value="Francês" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Conversação</label>
                                <select
                                    name="languages[3][speaking_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                    <option value="basic" selected>Básico</option> {{-- Pre-filled --}}
                                    <option value="good">Bom</option>
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Leitura</label>
                                <select
                                    name="languages[3][reading_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic" selected>Básico</option> {{-- Pre-filled --}}
                                    <option value="good">Bom</option>
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nível de Escrita</label>
                                <select
                                    name="languages[3][writing_level]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                >
                                    <option value="">Selecione</option>
                                     <option value="basic" selected>Básico</option> {{-- Pre-filled --}}
                                    <option value="good">Bom</option>
                                    <option value="fluent">Fluente</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-language text-sm"
                            >
                                Remover Idioma
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Language Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-language"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Idioma
                    </button>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Informações Adicionais</h2>
                <div id="additional-info-fields" class="space-y-2">
                    <!-- Pre-filled Additional Info -->
                    <div class="additional-info-field flex items-center space-x-2">
                        <input
                            type="text"
                            name="additional_information[]"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite uma informação adicional"
                            value="Carta de condução (Categoria B)" {{-- Pre-filled --}}
                        >
                        <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm">Remover</button>
                    </div>
                    <div class="additional-info-field flex items-center space-x-2">
                        <input
                            type="text"
                            name="additional_information[]"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite uma informação adicional"
                            value="Disponibilidade para viagens" {{-- Pre-filled --}}
                        >
                        <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm">Remover</button>
                    </div>
                     <div class="additional-info-field flex items-center space-x-2">
                        <input
                            type="text"
                            name="additional_information[]"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Digite uma informação adicional"
                            value="Voluntário na associação local de tecnologia" {{-- Pre-filled --}}
                        >
                        <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm">Remover</button>
                    </div>
                </div>
                <div class="mt-2 flex justify-start">
                    <button
                        type="button"
                        id="add-additional-info"
                        class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 text-sm"
                    >
                        Adicionar Informação Adicional
                    </button>
                </div>
            </div>

            <!-- References -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Referências</h2>
                <div id="reference-fields" class="space-y-6">
                    <!-- Pre-filled Reference -->
                    <div class="bg-gray-50 p-6 rounded-lg reference-field">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                                <input
                                    type="text"
                                    name="references[0][reference_name]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o nome da referência"
                                    value="Maria Santos" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Cargo</label>
                                <input
                                    type="text"
                                    name="references[0][reference_position]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o cargo da referência"
                                    value="Gerente de Projetos, Tech Solutions Lda" {{-- Pre-filled --}}
                                >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
                                <input
                                    type="text"
                                    name="references[0][reference_phone]"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    placeholder="Digite o telefone da referência"
                                    value="Disponível mediante solicitação" {{-- Pre-filled --}}
                                >
                            </div>
                        </div>
                         <div class="mt-4 flex justify-end">
                           <button
                                type="button"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 remove-reference text-sm"
                            >
                                Remover Referência
                            </button>
                        </div>
                    </div>
                </div>
                 <!-- Add Reference Button -->
                <div class="mt-4">
                    <button
                        type="button"
                        id="add-reference"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    >
                        Adicionar Referência
                    </button>
                </div>
            </div>

            <!-- Skills -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Habilidades</h2>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <textarea
                        id="skills"
                        name="skills"
                        rows="5" {{-- Increased rows for better view --}}
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="Liste suas habilidades (e.g., Comunicação, Liderança, Python, JavaScript)"
                    >PHP, Laravel, JavaScript, Vue.js, React, Node.js, HTML5, CSS3, Tailwind CSS, SQL (MySQL, PostgreSQL), NoSQL (MongoDB), Git, Docker, REST APIs, GraphQL, Testes Unitários (PHPUnit), Metodologias Ágeis (Scrum), Resolução de Problemas, Comunicação, Trabalho em Equipe</textarea> {{-- Pre-filled --}}
                     <small class="text-gray-500">Separe as habilidades por vírgula ou coloque uma por linha.</small>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button
                    type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                    Baixar CV
                </button>
            </div>
        </form>
    </div>
</div>

@endsection {{-- End of Blade section --}}

{{-- Ensure this <script> block appears only ONCE in your final HTML --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log("CV Form Script Initializing...");

    // --- Initialization (Adjusted for pre-filled items) ---
    let experienceIndex = 2; // 2 experiences pre-filled
    let educationIndex = 1;  // 1 education pre-filled
    let languageIndex = 4;   // 4 languages pre-filled
    let referenceIndex = 1;  // 1 reference pre-filled
    // No index needed for additional info based on original script logic

    const experienceFields = document.getElementById('experience-fields');
    const educationFields = document.getElementById('education-fields');
    const languageFields = document.getElementById('language-fields');
    const referenceFields = document.getElementById('reference-fields');
    const additionalInfoFields = document.getElementById('additional-info-fields');

    // --- Helper Function to Reset Fields ---
    function resetFields(element) {
        element.querySelectorAll('input[type="text"], input[type="date"], input[type="email"], textarea, select').forEach(field => {
            field.value = '';
        });
        element.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = false;
            const experienceField = checkbox.closest('.experience-field');
             if(checkbox.classList.contains('current-job-checkbox') && experienceField) {
                 const endDateInput = experienceField.querySelector('.end-date-input');
                 if (endDateInput) {
                     endDateInput.disabled = false;
                 }
             }
        });
        element.querySelectorAll('select').forEach(select => {
            if (select.options.length > 0) {
                select.selectedIndex = 0;
            }
        });
        const dutiesContainer = element.querySelector('.duties-fields');
        if (dutiesContainer) {
            const firstDuty = dutiesContainer.querySelector('.duty-field');
            if(firstDuty) {
                while(dutiesContainer.children.length > 1) {
                    dutiesContainer.removeChild(dutiesContainer.lastChild);
                }
                const remainingInput = dutiesContainer.querySelector('input');
                if (remainingInput) remainingInput.value = '';
            } else {
                 // If no duties existed (e.g., template was empty), clear it
                 dutiesContainer.innerHTML = '';
                 // Add back a single empty duty field when resetting an experience block
                 const experienceField = element.closest('.experience-field');
                 if (experienceField) addEmptyDutyField(dutiesContainer, experienceField);
            }
        }

        // Reset other fields like education year, language levels etc.
        element.querySelectorAll('select[name*="year_of_completion"], select[name*="speaking_level"], select[name*="reading_level"], select[name*="writing_level"]').forEach(select => {
             if (select.options.length > 0) {
                select.selectedIndex = 0;
            }
        });
    }

    // --- Helper Function to Add an Empty Duty Field ---
    function addEmptyDutyField(dutiesContainer, experienceField) {
        const div = document.createElement('div');
        div.className = 'flex items-center space-x-2 duty-field';
        const parentName = experienceField.querySelector('input[name*="[company_name]"]').name;
        const currentExpIndexMatch = parentName ? parentName.match(/\[(\d+)\]/) : null;
        const currentExpIndex = currentExpIndexMatch ? currentExpIndexMatch[1] : '0'; // Default to 0 if match fails
        div.innerHTML = `
            <input type="text" name="experience[${currentExpIndex}][duties][]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Digite uma responsabilidade" value="">
            <button type="button" class="remove-duty text-red-500 hover:text-red-700 text-sm">Remover</button>`;
        dutiesContainer.appendChild(div);
    }


    // --- Helper Function to Update Indices ---
    function updateFieldIndices(containerSelector, baseName) {
        const fields = document.querySelectorAll(`${containerSelector} > div`);
        fields.forEach((field, index) => {
            field.querySelectorAll('input, textarea, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name && name.includes(`[${baseName}[`)) { // Check if name belongs to this section
                    input.name = name.replace(new RegExp(`${baseName}\\[\\d+\\]`), `${baseName}[${index}]`);
                }
            });
            // Special handling for nested duties within experience
            if (baseName === 'experience') {
                field.querySelectorAll('.duty-field input').forEach(dutyInput => {
                     const dutyName = dutyInput.getAttribute('name');
                      if (dutyName && dutyName.includes('experience[')) {
                         dutyInput.name = dutyName.replace(/experience\[\d+\]/, `experience[${index}]`);
                      }
                });
             }
        });
        console.log(`Updated indices for ${baseName}, new count: ${fields.length}`);
        return fields.length; // Return the new count
    }

    // --- Add Experience ---
    const addExperienceButton = document.getElementById('add-experience');
    if (addExperienceButton && experienceFields) {
        addExperienceButton.addEventListener('click', function() {
            console.log("Add Experience Clicked");
            const template = experienceFields.querySelector('.experience-field:last-child'); // Clone the last one
            if (!template) {
                console.error("Experience field template not found!");
                return;
            }

            const newField = template.cloneNode(true);
            resetFields(newField); // Clear the cloned data

            // Correctly set the name attributes for the new index
            const currentIndex = experienceIndex; // Use the current index before incrementing
            newField.querySelectorAll('input, textarea, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name && name.includes('experience[')) {
                    input.name = name.replace(/experience\[\d+\]/, `experience[${currentIndex}]`);
                }
            });
             newField.querySelectorAll('.duty-field input').forEach(dutyInput => {
                 const dutyName = dutyInput.getAttribute('name');
                 if (dutyName && dutyName.includes('experience[')) {
                    dutyInput.name = dutyName.replace(/experience\[\d+\]/, `experience[${currentIndex}]`);
                 }
             });

            experienceFields.appendChild(newField);
            experienceIndex++; // Increment index *after* adding
             console.log("Experience added, new index:", experienceIndex);

             // Re-check 'current' checkbox state for the newly added field
            const newCheckbox = newField.querySelector('.current-job-checkbox');
            const newEndDateInput = newField.querySelector('.end-date-input');
            if (newCheckbox && newEndDateInput) {
                 newEndDateInput.disabled = newCheckbox.checked;
             }
        });
    } else {
        console.error("Add Experience button or fields container not found!");
    }

    // --- Add Education ---
     const addEducationButton = document.getElementById('add-education');
     if(addEducationButton && educationFields) {
         addEducationButton.addEventListener('click', function() {
            console.log("Add Education Clicked");
            const template = educationFields.querySelector('.education-field:last-child');
            if (!template) return;

            const newField = template.cloneNode(true);
            resetFields(newField);

            const currentIndex = educationIndex;
            newField.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name && name.includes('education[')) {
                    input.name = name.replace(/education\[\d+\]/, `education[${currentIndex}]`);
                }
            });

            educationFields.appendChild(newField);
            educationIndex++;
             console.log("Education added, new index:", educationIndex);
        });
     } else {
         console.error("Add Education button or fields container not found!");
     }

    // --- Add Language ---
    const addLanguageButton = document.getElementById('add-language');
    if(addLanguageButton && languageFields) {
        addLanguageButton.addEventListener('click', function() {
            console.log("Add Language Clicked");
            const template = languageFields.querySelector('.language-field:last-child');
            if (!template) return;

            const newField = template.cloneNode(true);
            resetFields(newField);

            const currentIndex = languageIndex;
            newField.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name && name.includes('languages[')) {
                    input.name = name.replace(/languages\[\d+\]/, `languages[${currentIndex}]`);
                }
            });

            languageFields.appendChild(newField);
            languageIndex++;
             console.log("Language added, new index:", languageIndex);
        });
    } else {
        console.error("Add Language button or fields container not found!");
    }

    // --- Add Reference ---
    const addReferenceButton = document.getElementById('add-reference');
    if(addReferenceButton && referenceFields) {
        addReferenceButton.addEventListener('click', function() {
            console.log("Add Reference Clicked");
            const template = referenceFields.querySelector('.reference-field:last-child');
            if (!template) return;

            const newField = template.cloneNode(true);
            resetFields(newField);

            const currentIndex = referenceIndex;
            newField.querySelectorAll('input').forEach(input => {
                const name = input.getAttribute('name');
                 if (name && name.includes('references[')) {
                    input.name = name.replace(/references\[\d+\]/, `references[${currentIndex}]`);
                }
            });

            referenceFields.appendChild(newField);
            referenceIndex++;
            console.log("Reference added, new index:", referenceIndex);
        });
    } else {
         console.error("Add Reference button or fields container not found!");
    }

    // --- Add Additional Info ---
     const addAdditionalInfoButton = document.getElementById('add-additional-info');
     if(addAdditionalInfoButton && additionalInfoFields) {
         addAdditionalInfoButton.addEventListener('click', function() {
            console.log("Add Additional Info Clicked");
            const template = additionalInfoFields.querySelector('.additional-info-field:last-child'); // Clone last one
            let newField;

            // Create a template if none exists (though unlikely with pre-filled data)
            const div = document.createElement('div');
            div.className = 'additional-info-field flex items-center space-x-2';
            div.innerHTML = `
                <input type="text" name="additional_information[]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Digite uma informação adicional" value="">
                <button type="button" class="remove-additional-info text-red-500 hover:text-red-700 text-sm">Remover</button>`;
            newField = div; // Always create a fresh empty one when adding

            additionalInfoFields.appendChild(newField);
        });
     } else {
         console.error("Add Additional Info button or fields container not found!");
     }

    // --- Event Delegation for Removing Fields and Adding/Removing Duties ---
    if (document.body) {
        document.body.addEventListener('click', function(event) {

            // Remove Experience Block
            if (event.target.classList.contains('remove-experience')) {
                console.log("Remove Experience Clicked");
                const fieldToRemove = event.target.closest('.experience-field');
                if (!fieldToRemove || !experienceFields) return;

                if (experienceFields.querySelectorAll('.experience-field').length > 1) {
                    fieldToRemove.remove();
                    // Re-index is important after removal
                    experienceIndex = updateFieldIndices('#experience-fields', 'experience');
                } else {
                    alert('Você precisa de pelo menos uma entrada de experiência.');
                    // Optionally reset instead of preventing removal
                    // resetFields(fieldToRemove);
                }
            }

            // Remove Education Block
            if (event.target.classList.contains('remove-education')) {
                console.log("Remove Education Clicked");
                 const fieldToRemove = event.target.closest('.education-field');
                 if (!fieldToRemove || !educationFields) return;

                 if (educationFields.querySelectorAll('.education-field').length > 1) {
                    fieldToRemove.remove();
                    educationIndex = updateFieldIndices('#education-fields', 'education');
                } else {
                    alert('Você precisa de pelo menos uma entrada de educação.');
                    // resetFields(fieldToRemove);
                }
            }

            // Remove Language Block
            if (event.target.classList.contains('remove-language')) {
                console.log("Remove Language Clicked");
                 const fieldToRemove = event.target.closest('.language-field');
                 if (!fieldToRemove || !languageFields) return;

                 if (languageFields.querySelectorAll('.language-field').length > 1) {
                    fieldToRemove.remove();
                    languageIndex = updateFieldIndices('#language-fields', 'languages');
                } else {
                    alert('Você precisa de pelo menos uma entrada de idioma.');
                    // resetFields(fieldToRemove);
                }
            }

             // Remove Reference Block
            if (event.target.classList.contains('remove-reference')) {
                console.log("Remove Reference Clicked");
                 const fieldToRemove = event.target.closest('.reference-field');
                  if (!fieldToRemove || !referenceFields) return;

                 if (referenceFields.querySelectorAll('.reference-field').length > 1) {
                    fieldToRemove.remove();
                    referenceIndex = updateFieldIndices('#reference-fields', 'references');
                } else {
                    alert('Você precisa de pelo menos uma entrada de referência.');
                    // resetFields(fieldToRemove);
                }
            }

             // Remove Additional Info Line
            if (event.target.classList.contains('remove-additional-info')) {
                 console.log("Remove Additional Info Clicked");
                 const fieldToRemove = event.target.closest('.additional-info-field');
                 if (!fieldToRemove || !additionalInfoFields) return;

                 // Always allow removal of additional info lines, even the last one
                 fieldToRemove.remove();
                 // No re-indexing needed for name="additional_information[]"
            }

            // Add Duty within an Experience Block
            if (event.target.classList.contains('add-duty')) {
                console.log("Add Duty Clicked");
                const experienceField = event.target.closest('.experience-field');
                if (!experienceField) return;

                const dutiesContainer = experienceField.querySelector('.duties-fields');
                if (!dutiesContainer) return;

                 // Add a new empty duty field
                 addEmptyDutyField(dutiesContainer, experienceField);

            }

            // Remove Duty within an Experience Block
            if (event.target.classList.contains('remove-duty')) {
                 console.log("Remove Duty Clicked");
                 const dutyField = event.target.closest('.duty-field');
                 if (!dutyField) return;

                 const dutiesContainer = dutyField.parentElement;
                 if (dutiesContainer && dutiesContainer.querySelectorAll('.duty-field').length > 1) {
                     dutyField.remove();
                 } else {
                     // Don't allow removing the last duty, just clear it
                     const input = dutyField.querySelector('input');
                     if(input) input.value = '';
                     alert('Cada experiência deve ter pelo menos uma responsabilidade. O campo foi limpo.');
                 }
            }

             // Handle 'Current' checkbox disabling/enabling end date
            if (event.target.classList.contains('current-job-checkbox')) {
                const experienceField = event.target.closest('.experience-field');
                if (!experienceField) return;

                const endDateInput = experienceField.querySelector('.end-date-input');
                if (endDateInput) {
                    endDateInput.disabled = event.target.checked;
                    if (event.target.checked) {
                        endDateInput.value = ''; // Clear end date if current is checked
                    }
                }
            }
        });
    } else {
        console.error("Document body not found for event listener attachment.");
    }


    // --- Removed Form Filler Scripting ---
    // const fillFormButton = ... (Removed)
    // const formFiller = ... (Removed)
    // fillForm function and create...Field functions (Removed)


    // Initial check for 'Current' checkboxes on page load (important for pre-filled data)
    document.querySelectorAll('.current-job-checkbox').forEach(checkbox => {
         const experienceField = checkbox.closest('.experience-field');
          if (!experienceField) return;
         const endDateInput = experienceField.querySelector('.end-date-input');
         if (endDateInput) {
             endDateInput.disabled = checkbox.checked;
         }
    });

    console.log("CV Form Script Initialized Successfully.");

});
</script>