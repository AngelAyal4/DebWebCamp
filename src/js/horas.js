(function(){
    const horas = document.querySelector('#horas');

    if(horas){

        let busqueda = {
            categoria_id: '',
            dia: ''
        }

        const categoria = document.querySelector('[name="categoria_id"]');
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDia =  document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');


        categoria.addEventListener('change', terminoBusqueda);
        dias.forEach(dia => {
            dia.addEventListener('click', terminoBusqueda);
        });

        function terminoBusqueda(e){

            busqueda[e.target.name] = e.target.value;

            //Reiniciar los campos ocultos y el selector de horas
            inputHiddenDia.value = '';
            inputHiddenHora.value = '';
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if(horaPrevia){
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }




            if(Object.values(busqueda).includes('')){
                return;
            }
            buscarEventos();

        }
        async function buscarEventos(){

            const { categoria_id, dia } = busqueda;
            const url = `/api/eventos-horarios?categoria_id=${categoria_id}&dia=${dia}`;
            const respuesta = await fetch(url);
            const eventos = await respuesta.json();



            obtenerHorasDisponibles(eventos);

        }

        function obtenerHorasDisponibles(eventos){

            //Reiniciar las horas
            const listadoHoras = document.querySelectorAll('#horas li');
            listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitada'));


            const hotasTomadas =  eventos.map(evento => evento.hora_id);
            const listadoHorasArray = Array.from(listadoHoras);

            const resultado = listadoHorasArray.filter(li => !hotasTomadas.includes(li.dataset.horaId));
            resultado.forEach(li => li.classList.remove('horas__hora--deshabilitada'));

            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitada)');
            horasDisponibles.forEach(hora => {hora.addEventListener('click', seleccionarHora)});
        }

        function seleccionarHora(e){
            //Desabilitar la hora previa si hay un nuevo click
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if(horaPrevia){
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            //Argegar clase de seleccionado
            e.target.classList.add('horas__hora--seleccionada');

            inputHiddenHora.value = e.target.dataset.horaId; // <-- Cambia aquí

            //LLenar el campo oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;

        }
        
    }
})();