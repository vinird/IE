app.controller('CtrlTable', ['$scope', function(s){

s.cicle1 = [{
		sigla: 'EG-',
		curso: 'Curso de Arte',
		creditos: '2',
		requisitos: '',
		correquisitos: ''
	},
	{
		sigla: 'EG-l',
		curso: 'Curso Integrado de Humanidades l',
		creditos: '6',
		requisitos: '',
		correquisitos: ''
	},
	{
		sigla: 'IF1300',
		curso: 'Introducción a la Computaión e Informática',
		creditos: '4',
		requisitos: '',
		correquisitos: ''
	},
	{
		sigla: 'IF1400',
		curso: 'Lógica para Informáticos',
		creditos: '2',
		requisitos: '',
		correquisitos: ''
	},
	{
		sigla: 'LM1030',
		curso: 'Estrategias de Lectura en Inglés l',
		creditos: '4',
		requisitos: '',
		correquisitos: ''
	},
	];

s.cicle2 = [{
		sigla: 'EF-',
		curso: 'Actividad Deportiva',
		creditos: '0',
		requisitos: '',
		correquisitos: ''
	},
	{
		sigla: 'EG-ll',
		curso: 'Curso Integrado de Humanidades ll',
		creditos: '6',
		requisitos: 'EG-l',
		correquisitos: ''
	},
	{
		sigla: 'IF2000',
		curso: 'Programación l',
		creditos: '4',
		requisitos: 'IF1300',
		correquisitos: ''
	},
	{
		sigla: 'LM1032',
		curso: 'Estrategias de Lectura en Inglés ll',
		creditos: '4',
		requisitos: 'LM1030',
		correquisitos: ''
	},
	{
		sigla: 'MA0320',
		curso: 'Estructuras Matemáticas Discretas',
		creditos: '4',
		requisitos: '',
		correquisitos: ''
	},
	];

s.cicle3 = [{
		sigla: 'IF3000',
		curso: 'Programación ll',
		creditos: '4',
		requisitos: 'IF2000',
		correquisitos: 'IF3001'
	},
	{
		sigla: 'IF3001',
		curso: 'Algortmos y Estructura de Datos',
		creditos: '4',
		requisitos: 'IF2000',
		correquisitos: 'IF3000'
	},
	{
		sigla: 'IF3100',
		curso: 'Introducción a Sistemas de Información',
		creditos: '3',
		requisitos: 'IF1300',
		correquisitos: ''
	},
	{
		sigla: 'MA0321',
		curso: 'Cálculo Diferencial e Integral',
		creditos: '4',
		requisitos: 'LM1030',
		correquisitos: ''
	},
	{
		sigla: 'XS0105',
		curso: 'Estadística para Informáticos',
		creditos: '3',
		requisitos: '',
		correquisitos: ''
	},
	];

s.cicle4 = [{
		sigla: 'IF4000',
		curso: 'Arquitectura de Computadores',
		creditos: '3',
		requisitos: 'IF3000',
		correquisitos: ''
	},
	{
		sigla: 'IF4001',
		curso: 'Sistemas Operativos',
		creditos: '4',
		requisitos: 'IF3000, IF3001',
		correquisitos: ''
	},
	{
		sigla: 'IF4100',
		curso: 'Funtamentos de Bases de Datos',
		creditos: '4',
		requisitos: 'IF3000',
		correquisitos: ''
	},
	{
		sigla: 'IF5200',
		curso: 'Fundamentos de la Organizaciones',
		creditos: '3',
		requisitos: 'IF3001',
		correquisitos: ''
	},
	{
		sigla: 'MA0322',
		curso: 'Algebra Lineal',
		creditos: '4',
		requisitos: 'MA0320, MA0321',
		correquisitos: ''
	},
	];

s.cicle5 = [{
		sigla: 'IF4101',
		curso: 'Lenguajes para Aplicaciones Comerciales',
		creditos: '4',
		requisitos: 'IF3100, IF4100',
		correquisitos: ''
	},
	{
		sigla: 'IF5000',
		curso: 'Redes y Comunicaciones de Datos',
		creditos: '4',
		requisitos: 'IF4001',
		correquisitos: ''
	},
	{
		sigla: 'IF5100',
		curso: 'Administración de Bases de Datos',
		creditos: '4',
		requisitos: 'IF4100',
		correquisitos: ''
	},
	{
		sigla: 'MA0323',
		curso: 'Métodos Numéricos',
		creditos: '4',
		requisitos: 'MA0322',
		correquisitos: ''
	},
	{
		sigla: 'SR-l',
		curso: 'Seminario de Realidad Nacional l',
		creditos: '2',
		requisitos: 'EG-ll',
		correquisitos: ''
	},
	];

s.cicle6 = [{
		sigla: 'IF6000',
		curso: 'Redes en los Negocios',
		creditos: '4',
		requisitos: 'IF5000',
		correquisitos: ''
	},
	{
		sigla: 'IF6100',
		curso: 'Análisis y Diseño de Sistemas',
		creditos: '4',
		requisitos: 'IF5100',
		correquisitos: ''
	},
	{
		sigla: 'IF6200',
		curso: 'Economía de la Computación',
		creditos: '3',
		requisitos: 'MA0323',
		correquisitos: ''
	},
	{
		sigla: 'IF6201',
		curso: 'Informática Aplicada a los Negocios',
		creditos: '3',
		requisitos: 'IF5200',
		correquisitos: ''
	},
	{
		sigla: 'SR-l',
		curso: 'Seminario de Realidad Nacional ll',
		creditos: '2',
		requisitos: 'SR-l',
		correquisitos: ''
	},
	];

s.cicle7 = [{
		sigla: 'IF7100',
		curso: 'Ingeniería de Software',
		creditos: '4',
		requisitos: 'IF6100',
		correquisitos: ''
	},
	{
		sigla: 'IF7101',
		curso: 'Compromiso Social de la Informática',
		creditos: '2',
		requisitos: '',
		correquisitos: 'IF7100'
	},
	{
		sigla: 'IF7200',
		curso: 'Métodos Cuantitativos para la toma de decisiones',
		creditos: '4',
		requisitos: 'IF6000, IF6200',
		correquisitos: ''
	},
	{
		sigla: 'IF7201',
		curso: 'Gestión de Proyectos',
		creditos: '4',
		requisitos: 'IF6200',
		correquisitos: ''
	},
	{
		sigla: 'OPT453',
		curso: 'Optativo de Temas Especiales',
		creditos: '3',
		requisitos: '',
		correquisitos: ''
	},
	];

s.cicle8 = [{
		sigla: 'IF8100',
		curso: 'Prática Empresarial Supervisada',
		creditos: '6',
		requisitos: 'IF7100, IF7201',
		correquisitos: ''
	},
	{
		sigla: 'IF8200',
		curso: 'Auditoría Informática',
		creditos: '4',
		requisitos: 'IF7100, IF7201',
		correquisitos: ''
	},
	{
		sigla: 'IF8201',
		curso: 'Planificación Informática',
		creditos: '4',
		requisitos: 'IF7201',
		correquisitos: ''
	},
	{
		sigla: 'RP-l',
		curso: 'Repertorio',
		creditos: '3',
		requisitos: '',
		correquisitos: ''
	}
	];

s.cursos = s.cicle1;

s.loadCicle = function(cicle) {
	switch(cicle){
		case 1:
			s.cursos = s.cicle1;
			break;
		case 2:
			s.cursos = s.cicle2;
			break;
		case 3:
			s.cursos = s.cicle3;
			break;
		case 4:
			s.cursos = s.cicle4;
			break;
		case 5:
			s.cursos = s.cicle5;
			break;
		case 6:
			s.cursos = s.cicle6;
			break;
		case 7:
			s.cursos = s.cicle7;
			break;
		case 8:
			s.cursos = s.cicle8;
			break;	
	}
}
}]);
