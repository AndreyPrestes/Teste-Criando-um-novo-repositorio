<main class="main-container" id="main_container">
    <form name="formulario-inscricao" action="recebedados.php" method="post">







    
        <h2>Preencha nosso formulário!</h2>
        <h2>E receba mais informações sobre os cursos!</h2>


       

            <!-- Escolha um Brasil/Fora do Brasil -->
            <!-- <label>Selecione uma opção de localização: </label>
            <select name="local">
                <option disabled selected>
                    País
                </option>
                <option value="brasil">
                    Brasil
                </option>
                <option value="portugal">
                    Portugal
                </option>
                <option value="outro">
                    Outro
                </option>
            </select>
            <br><br> -->


            <div class="sub-container">
                <!-- ESCOLHA UM CURSO -->
                <label class="container">Quero receber informações sobre o curso: </label>
                <br>
                <input class="" type="radio" name="escolhacurso" value="curso-basico" id="curso-basico">
                <label class="" for="curso-basico"> Básico</label>
                <br>
                <input class="" type="radio" name="escolhacurso" value="curso-avançado" id="curso-avançado">
                <label class="" for="curso-avançado"> Avançado</label>
                <br>
                <input class="" type="radio" name="escolhacurso" value="dois-cursos" id="dois-cursos">
                <label class="" for="dois-cursos">Básico & Avançado</label>
                <br>


                <!-- QUERO RECEBER INFORMAÇÕES SOBRE NOVOS CURSOS -->
                <input type="checkbox" name="info-novos-cursos" value="selecionado" id="info-novos-cursos">
                <label for="info-novos-cursos">Quero receber informações sobre novos cursos no futuro</label>
                <br>

                <!-- CONCORDO COM OS TERMOS E CONDIÇOES -->
                <input type="checkbox" name="concordo" value="selecionado" id="concordo">
                <label>Concordo em receber informações sobre o(s) curso(s) de fotografia</label>
                <br>

                <!-- BOTÃO ENVIAR -->
                <ul class="container-ancor-medias">
                    <li class="container-lis-item"><a class="ancor-medias" href="https://www.instagram.com/pedro.sbardelotto/" target="_blank">INSTAGRAM</a>
                    </li>
                    <li class="container-lis-item"><a class="ancor-medias" href="https://web.whatsapp.com" target="_blank">WHATSAPP</a></li>
                    <li class="container-lis-item"><a class="ancor-medias" href="https://www.linkedin.com" target="_blank">LINKEDIN</a></li>
                </ul>
            </div>










            <!-- IMAGEM CURSO BÁSICO -->

            <img src="img/05.jpg" alt="foto imagem paisagem + pessoas">

            <!-- TEXTO CURSO BÁSICO -->

            <h2>| Curso Básico de Fotografia |</h2>

            <p>- Prepara o aluno para iniciar como profissional na área de fotografia -</p>
            <p>- Gera a oportunidade de ingressar nos cursos mais avançados, para quem busca uma
                especialização na
                área -</p>
            <p>- Dá ferramentas para que o aluno consiga realizar um trabalho autoral -</p>
            <p>- Possibilita o aumento da qualidade das fotos em mídias sociais -</p>

            <!-- IMAGEM CURSO AVANÇADO -->

            <img src="img/07.jpg" alt="foto de uma paisagem">

            <!-- TEXTO CURSO AVANÇADO -->

            <h2>| Curso Avançado de Fotografia |</h2>

            <p> -Aprimora e desenvolve o aluno em conceitos avançados -</p>
            <p> -Ensina as principais técnicas da área -</p>
            <p> -Amplia o repertório artístico e cultura, ajudando a criar no aluno um olhar criterioso -</p>
            <p> -Indicado para quem já tem o conhecimento do Curso Básico de Fotografia -</p>



            <br>
        </fieldset>
    </form>
</main>