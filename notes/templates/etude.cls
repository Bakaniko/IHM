%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%% Classe de rapport pédagogique v3
%%
%% Vincent Labatut 2014-2016
%%
%% v1   - 10/2014 : forme de rapport très différente
%% v2   - 02/2015 : modèle complètement refait
%% v2.1 - 03/2015 : définition de la page de titre
%% v2.2 - 03/2015 : correction de quelques bugs
%% v2.3 - 04/2015 : page de titre complétée (date, adresse postale, long titre)
%% v2.4 - 12/2015 : diverses modifications du contenu du document
%% v3   - 01/2016 : définition de la classe latex
%% V4.0 - 04/2017 : personnalisation pour projet télédétection
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

% init class
	\NeedsTeXFormat{LaTeX2e}
	\ProvidesClass{ceri}[2016/01/08 Report LaTeX class]
	\LoadClass[a4paper, 11pt, final]{report}	% based on the existing latex class


% various packages
	\RequirePackage{xspace}						% used by babel
	\RequirePackage[numbers]{natbib}
	\RequirePackage[english,francais]{babel}	% necessary for french documents
	\RequirePackage[utf8]{inputenc}				% use source file containing diacritics
	\RequirePackage[T1]{fontenc}				% select font encoding and allow hyphenation
	\RequirePackage[table,xcdraw]{xcolor}				% put colors in the document
	\let\normalcolor\relax
	\RequirePackage{lmodern}					% use specific fonts
	\RequirePackage{graphicx}					% include pictures
	\RequirePackage{url}						% display urls
	\RequirePackage{amsmath}					% extended equations
%	\RequirePackage{ifthen}						% if/then expressions
	\RequirePackage{lastpage}					% last page number
	\RequirePackage{textcomp}					% degree character
	\RequirePackage{printlen}					% display lengths
	\RequirePackage{xstring}					% handle strings functions
	%\RequirePackage{subfig}					% subfloats (subfigures, subtables...)
	\RequirePackage{pdfpages}					% insertion de pdfs
	\RequirePackage{float}	 					% custom floats environments
%\RequirePackage{caption}
%\RequirePackage{subcaption}
\RequirePackage{xifthen}
\RequirePackage[%
    font={small,sf},
    labelfont=bf,
    format=hang,
    format=plain,
    margin=0pt,
    width=0.8\textwidth,
]{caption}
\RequirePackage[list=true]{subcaption}

\RequirePackage{booktabs}
\RequirePackage{varwidth}

%	\RequirePackage{tocloft}	 				% list of custom float objects
	\RequirePackage{setspace}
	\RequirePackage[french]{varioref}
	\RequirePackage{tikz}
	\RequirePackage{authoraftertitle}			% access title and author names
	\RequirePackage{fancyhdr}					% custom headers and footers
	\RequirePackage{multicol}					% colonnes
% due to a warning
	\setlength{\headheight}{13.6pt}

% needed fo UAPV title page formating
	\RequirePackage{soul}
	\RequirePackage{graphicx}
	\sodef\ugg{}{.4em plus 1fill}{1em plus 2 fill}{2em plus 2fill minus.1em}

% custom margins
	\RequirePackage[top=2.5cm, bottom=2.5cm, left=2.5cm, right=2.5cm]{geometry}

% environnement verbatim
	\RequirePackage{listings}

	\lstdefinestyle{customc}{
	  belowcaptionskip=1\baselineskip,
	  breaklines=true,
	  frame=L,
	  xleftmargin=\parindent,
	  language=C,
	  showstringspaces=false,
	  basicstyle=\footnotesize\ttfamily,
	  keywordstyle=\bfseries\color{green!40!black},
	  commentstyle=\itshape\color{purple!40!black},
	  identifierstyle=\color{blue},
	  stringstyle=\color{orange},
	}

	\lstdefinestyle{customasm}{
	  belowcaptionskip=1\baselineskip,
	  frame=L,
	  xleftmargin=\parindent,
	  language=[x86masm]Assembler,
	  basicstyle=\footnotesize\ttfamily,
	  commentstyle=\itshape\color{purple!40!black},
	}

	\lstset{escapechar=@,style=customc}

% gestion des accents dans listings
\lstset{literate=
  {á}{{\'a}}1 {é}{{\'e}}1 {í}{{\'i}}1 {ó}{{\'o}}1 {ú}{{\'u}}1
  {Á}{{\'A}}1 {É}{{\'E}}1 {Í}{{\'I}}1 {Ó}{{\'O}}1 {Ú}{{\'U}}1
  {à}{{\`a}}1 {è}{{\`e}}1 {ì}{{\`i}}1 {ò}{{\`o}}1 {ù}{{\`u}}1
  {À}{{\`A}}1 {È}{{\'E}}1 {Ì}{{\`I}}1 {Ò}{{\`O}}1 {Ù}{{\`U}}1
  {ä}{{\"a}}1 {ë}{{\"e}}1 {ï}{{\"i}}1 {ö}{{\"o}}1 {ü}{{\"u}}1
  {Ä}{{\"A}}1 {Ë}{{\"E}}1 {Ï}{{\"I}}1 {Ö}{{\"O}}1 {Ü}{{\"U}}1
  {â}{{\^a}}1 {ê}{{\^e}}1 {î}{{\^i}}1 {ô}{{\^o}}1 {û}{{\^u}}1
  {Â}{{\^A}}1 {Ê}{{\^E}}1 {Î}{{\^I}}1 {Ô}{{\^O}}1 {Û}{{\^U}}1
  {œ}{{\oe}}1 {Œ}{{\OE}}1 {æ}{{\ae}}1 {Æ}{{\AE}}1 {ß}{{\ss}}1
  {ű}{{\H{u}}}1 {Ű}{{\H{U}}}1 {ő}{{\H{o}}}1 {Ő}{{\H{O}}}1
  {ç}{{\c c}}1 {Ç}{{\c C}}1 {ø}{{\o}}1 {å}{{\r a}}1 {Å}{{\r A}}1
  {€}{{\euro}}1 {£}{{\pounds}}1 {«}{{\guillemotleft}}1
  {»}{{\guillemotright}}1 {ñ}{{\~n}}1 {Ñ}{{\~N}}1 {¿}{{?`}}1
}

% thick lines in the tables
	\newcommand{\HRule}{\rule{\linewidth}{0.5mm}}


% colors
	\definecolor{DarkColor}{gray}{0.75}
	\definecolor{LightColor}{gray}{0.9}
	\definecolor{LightGrey}{rgb}{0.96,0.96,0.96}
	\definecolor{DarkGrey}{rgb}{0.83,0.83,0.83}
	\definecolor{BaseColor}{rgb}{0.58,0.05,0.09}%{0.55,0.70,0.06}%{0.64,0.69,0.31}
	\definecolor{bleuciel}{rgb}{0.85,0.89,0.93}
	\definecolor{TextColor}{rgb}{0.58,0.05,0.09}%{0.44,0.49,0.11}
	\definecolor{VertDepartementGeo}{rgb}{0.55,0.70,0.06}
	\definecolor{jaune}{rgb}{0.92,0.90,0.30}
	\definecolor{rouge}{rgb}{0.58,0.05,0.09}


% macros allowing to set the document info
	\def\subtitle#1{\gdef\mysubtitle{#1}}
	\def\classname#1{\gdef\myclassname{#1}}
	\def\formation#1{\gdef\myformation{#1}}
	\def\parcours#1{\gdef\myparcours{#1}}
	\def\responsable#1{\gdef\responsable{#1}}
	\ifthenelse{\isempty{\chargeDeCours#1}}{}{\def\chargeDeCours#1{\gdef\chargeDeCours{#1}}}
	\def\imageDeCouverture#1{\gdef\imageDeCouverture{#1}}
	\def\subject#1{\gdef\MySubject{#1}}
	\def\tags#1{\gdef\MyTags{#1}}

% hyperlinks
	\RequirePackage[
		bookmarks=true, bookmarksnumbered=true, bookmarksopen=true,
		unicode=true, colorlinks=true, linktoc=all, %linktoc=page
		linkcolor=TextColor, citecolor=TextColor, filecolor=TextColor, urlcolor=TextColor,
		pdfstartview=FitH
]{hyperref}

\newcommand\fnurl[2]{%
\href{#2}{#1}\footnote{\url{#2}}%
}


% arrays and tables
	\RequirePackage{array}							% handle arrays
	% Macro by A. Kassi
	% http://www.ukonline.be/programmation/latex/tutoriel/chapitre4/page2.php
	\makeatletter
		\def\hlinewd#1{
		\noalign{\ifnum0=`}\fi\hrule \@height #1
		\futurelet\reserved@a\@xhline}
	\makeatother
	% end macro


% NOTE: only (?) for the report class
	\RequirePackage{chngcntr}				% hide the chapter number in section headings
	\counterwithout{section}{chapter}		% hide the chapter number in section headings


% change default font
	\renewcommand{\familydefault}{\sfdefault}


% custom list bullets
%	\renewcommand{\labelitemi}{$\bullet$}
	\renewcommand{\FrenchLabelItem}{\textbullet}

% custom captions
	\RequirePackage{caption}
	\captionsetup{
		labelfont={color=TextColor, bf, small},	% font(sf), color, bold, size of the caption label
		textfont={small},								% font(sf) and size of the caption text itself
		labelsep=period,								% separator between label and text
		margin=10mm										% left/right margins
	}


% custom equations
	\makeatletter								% change equation numbers
	\def\tagform@#1{\maketag@@@{(\color{TextColor}\textbf{#1}\normalcolor)\@@italiccorr}}
	\makeatother


% custom section headers
	\makeatletter
		\renewcommand{\section}{
		    \@startsection{section}{1}{0pt}
		    {-3.5ex plus -1ex minus -.2ex}
		    {2.3ex plus.2ex}
		    {\color{TextColor}\normalfont\Large\bfseries}
		}
		\renewcommand\subsection{
		    \@startsection{subsection}{2}{\z@}
	    		{-3.25ex\@plus -1ex \@minus -.2ex}
		    {1.5ex \@plus .2ex}
		    {\color{TextColor}\normalfont\large\bfseries}
		}
		\renewcommand\subsubsection{
	    		\@startsection{subsubsection}{3}{\z@}
	    		{-3.25ex\@plus -1ex \@minus -.2ex}
	    		{1.5ex \@plus .2ex}
	    		{\color{TextColor}\normalfont\normalsize\bfseries}
		}
		\renewcommand\paragraph{
	    		\@startsection{paragraph}{4}{\z@}
	    		{-3.25ex\@plus -1ex \@minus -.2ex}
	    		{-1em}
	    		{\color{TextColor}\normalfont\normalsize}
		}
		\renewcommand\subparagraph{
	    		\@startsection{subparagraph}{5}{\z@}
	    		{-3.25ex\@plus -1ex \@minus -.2ex}
	    		{-1em}
	    		{\color{TextColor}\normalfont\normalsize}
		}
	\makeatother
    \setcounter{secnumdepth}{3}		% number subsubsections
	\setcounter{tocdepth}{3}			% and include them in the TOC


% custom table of contents
	\newcommand{\tocName}{Sommaire}									% define TOC header
	\addto\captionsfrench{\renewcommand{\contentsname}{\color{TextColor}\tocName}}	% change TOC header

% custom list of figures
	\newcommand{\lofName}{Liste des figures}						% define LOF header
%	\renewcommand{\listfigurename}{\lofName}						% change LOF header (1)
	\addto\captionsfrench{\renewcommand{\listfigurename}{\color{TextColor}\lofName}}	% change LOF header (2)


% custom list of tables
	\newcommand{\lotName}{Liste des tables}							% define LOT header
%	\renewcommand{\listtablename}{\lotName}							% change LOT header (1)
	\addto\captionsfrench{\renewcommand{\listtablename}{\color{TextColor}\lotName}}	% change LOT header (2)


%% custom section
	\newcommand{\merci}{Remerciements}							% define LOT header
%%	\renewcommand{\listtablename}{\lotName}							% change LOT header (1)
%	\addto\captionsfrench{\merci}	% change LOT header (2)
%


% custom bibliography
	\RequirePackage{babelbib}								% language-dependent bibliography
	\newcommand{\bibName}{Bibliographie}					% define bibliography header
%	\RequirePackage[square, comma, sort&compress]{natbib}	% compress numbered citations


% custom date format
	\RequirePackage{datetime}
% custom pdf caption
	\usepackage{pdflscape}

	% Setup the new 'pagecommand*' option key-value
	\usepackage{etoolbox}
	\usepackage{pdfpages}
	\makeatletter
	\newcommand*{\AM@pagecommandstar}{}
	\define@key{pdfpages}{pagecommand*}{\def\AM@pagecommandstar{#1}}
	\patchcmd{\AM@output}{\begingroup\AM@pagecommand\endgroup}
	{\ifthenelse{\boolean{AM@firstpage}}{\begingroup\AM@pagecommandstar\endgroup}{\begingroup\AM@pagecommand\endgroup}}{}{} % Patch to use new option
	\patchcmd{\AM@split@optionsii}{\equal{pagecommand}{\AM@temp}\or}
	{\equal{pagecommand}{\AM@temp}\or\equal{pagecommand*}{\AM@temp}\or}{}{}
	\makeatother


% title page
	\renewcommand{\maketitle}{
		% setup PDF doc info
		\hypersetup{
    		pdftitle={\MyTitle},%
	    	pdfauthor={\MyAuthor},%
	    	%pdfsubject={\MySubject},%
			%pdfkeywords={\MyTags}%
		}

		% custom headers and footers
		\pagestyle{fancy}
		\fancyhf{}
		\renewcommand{\headrulewidth}{0.4pt}
		\renewcommand{\footrulewidth}{0.4pt}
		\cfoot{\thepage\ / \pageref*{LastPage}}
		\chead{\MyTitle \\ \mysubtitle}

		% draw title page
		\phantomsection
		\addcontentsline{toc}{section}{Titre}	% add the title page in the TOC (yes! for PDF bookmark)
		\begin{titlepage}
			\begin{tikzpicture}[remember picture,overlay]
				% vertical lines
		    	\node at (current page.south west)
				{	\begin{tikzpicture}[remember picture,overlay]

						%% remplissage
						\fill[fill=LightGrey]  (0cm,19.2cm) rectangle(21cm,29.7cm);
						\fill[fill=DarkGrey] (0cm,0cm) rectangle(21cm,26.2cm);
						\ifthenelse{\isempty{\chargeDeCours}}{\fill[fill=red] (0cm,1.5cm) rectangle(21cm,3.5cm);}{\fill[fill=bleuciel] (0cm,1.5cm) rectangle(21cm,4cm);}
						%\fill[fill=bleuciel] (0cm,1.5cm) rectangle(21cm,4cm);
						%\fill[fill=BaseColor] (1cm,0cm) rectangle(5.2cm,25.2cm);
						\fill[fill=BaseColor] (1cm,0cm) rectangle(5.2cm,29.7cm);

						%%images

							% LOGO P8
 						%\pgftext[x=1cm,y=25.4cm,bottom,left]{\includegraphics[width=4.2cm]{templates/logop8.png}};
 						\pgftext[x=1.1cm,y=26.4cm,bottom,left]{\includegraphics[width=4.0cm]{templates/logo_p8_blanc.png}};

 							% image de couverture
							\pgftext[x=18.5cm,y=9.5cm,bottom,right]{\includegraphics[width=11cm]{../images/les_contes_d_hoffmann_1_christian_leiber_opera_national_de_paris.jpg}};
 							%\pgftext[x=18.5cm,y=6.5cm,bottom,right]{\includegraphics[width=9cm]{\imageDeCouverture}};

 						%% Departement
 						%\pgftext[x=1.1cm,y=25.5cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{13}{13}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{\ugg{\textbf{UFR}}}}}};
 						\pgftext[x=1.1cm,y=25cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{20}{20}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{\ugg{\textbf{{UFR}}}}}}};
						\pgftext[x=1.1cm,y=24.5cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{20}{20}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{\ugg{\textbf{{eriTes}}}}}}};
						%\pgftext[x=1.1cm,y=24.5cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{\ugg{\textbf{eriTES}}}}}};

 						%% intitulé formation
 						%\pgftext[x=1.1cm,y=24.2cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][l]{\ugg{\textbf{}}}}}};
 						\pgftext[x=5.5cm,y=23.5cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{13}{13}{\fontfamily{phv}\selectfont{}\textbf{\myformation}}}};
 						\pgftext[x=5.5cm,y=23.0cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{13}{13}{\fontfamily{phv}\selectfont{}\textbf{\myparcours}}}};
 						\pgftext[x=5.5cm,y=22.5cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{13}{13}{\fontfamily{phv}\selectfont{}\textbf{UE} \myclassname}}};

 						%% Titre
 						\pgftext[x=3.5cm,y=21.0cm,bottom,left]{\scalebox{0.77}[1]{\fontsize{25}{30}{\fontfamily{phv}\selectfont{}\textbf{\textcolor{white}{>{}>{}>}\hspace{1cm}\textcolor{BaseColor}{\parbox{19cm}{\raggedright\MyTitle}}}}}};
						%% Sous-titre
 						\pgftext[x=5.5cm,y=20.2cm,bottom,left]{\scalebox{0.77}[1]{\fontsize{20}{20}{\fontfamily{phv}\selectfont{}\textbf{\textcolor{BaseColor}{\raggedright \mysubtitle }}}}};

 						%\pgftext[x=3.5cm,y=19.5cm,bottom,left]{\scalebox{0.77}[1]{\fontsize{30}{30}{\fontfamily{phv}\selectfont{}\textbf{\textcolor{white}{>{}>{}>}\hspace{0.7cm}\textcolor{BaseColor}{\parbox{19cm}{\raggedright\MyTitle}}}}}};

						%% Auteur
 						\pgftext[x=5.5cm,y=19.5cm,bottom,left]{\scalebox{0.77}[1]{\fontsize{15}{15}{\fontfamily{phv}\selectfont{}\textcolor{black}{\MyAuthor}}}};
 						\pgftext[x=5.5cm,y=19.0cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{13}{13}{\fontfamily{phv}\selectfont{}\textbf{\today}}}};


  \ifthenelse{\isundefined{\chargeDeCours}}{}{\pgftext[x=5.5cm,y=3.1cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{18}{18}{\fontfamily{phv}\selectfont{}\textbf{\chargeDeCours}}}};}
 %\pgftext[x=5.5cm,y=3.4cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{18}{18}{\fontfamily{phv}\selectfont{}\textbf{Chargé de cours : ?????}}}};
 \pgftext[x=5.5cm,y=2.1cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{18}{18}{\fontfamily{phv}\selectfont{}\textbf{\responsable}}}};

 						%% coordonnées Master
 						\pgftext[x=1.1cm,y=4.7cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{Université Paris 8}}}};
 						\pgftext[x=1.1cm,y=4.2cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{UFR eriTES}}}};
 						\pgftext[x=1.1cm,y=3.7cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{Bât. D, salle 128}}}};
 						\pgftext[x=1.1cm,y=3.4cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{2, rue de la Liberté}}}};
 						\pgftext[x=1.1cm,y=3.0cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{93256 Saint-Denis Cedex}}}};
 						\pgftext[x=1.1cm,y=2.6cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{France}}}};
 						\pgftext[x=1.1cm,y=1.9cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{Tél. +33 (0)1 49 40 73 25}}}};
 						\pgftext[x=1.1cm,y=1.4cm,bottom,left]{\scalebox{0.6}[1]{\fontsize{12}{12}{\fontfamily{ptm}\selectfont{}\makebox[6.7cm][c]{http://www2.univ-paris8.fr/ingenierie-cognition/master-handi/}}}};


					\end{tikzpicture}
				};
			\end{tikzpicture}
		\end{titlepage}





		\setcounter{page}{2} 	% set the second page... to number 2
		\thispagestyle{fancy}	% force header/footer
		\newpage
	}

%%% insérer les sources sous une figure/table !!! alignée à droite et collée à l'image
\newcommand{\source}[1]{\vspace{-40pt} \caption*{ \hfill \tiny{Source: {#1}}} }


%% variante: {caption}{source}
\newcommand*{\captionsource}[2]{%
	\vspace{-2em}
	\flushright \tiny{\textbf{Source:} #2}%
	 \\%\hspace{\linewidth}%
  	\centering \caption[{#1}]{%
    #1%
  }%
}

% tables
	\newcommand{\MyToc}{
		\phantomsection
		\addcontentsline{toc}{section}{\tocName}	% add the TOC in the TOC (yes! for PDF bookmark)
		\tableofcontents							% insert TOC
		\thispagestyle{fancy}						% force header/footer
		\newpage
	}
	\newcommand{\MyLof}{
		\phantomsection
		\addcontentsline{toc}{section}{\lofName}	% add the LOF in the TOC
		\listoffigures								% insert LOF
		\thispagestyle{fancy}						% force header/footer
		\newpage
	}
	\newcommand{\MyLot}{
		\phantomsection
		\addcontentsline{toc}{section}{\lotName}	% add the LOT in the TOC
		\listoftables								% insert LOT
		\thispagestyle{fancy}						% force header/footer
		\newpage
	}

		\newcommand{\mySection}[1]{
		\noindent{\textcolor{TextColor}{\huge{\textbf{#1}}}}
		\phantomsection
		\addcontentsline{toc}{section}{#1}	% add the LOT in the TOC
		\thispagestyle{fancy}						% force header/footer
		\vspace{1.5cm}
		%\newpage
	}





% bibliography
	% receives the bibtex file
	\newcommand{\MyBibliography}[1]{
		% NOTE: for TexMaker it was necessary to reconfigure the bibtex target from "bibtex %.aux" to "bibtex %"
		\newpage
		\phantomsection
		\addcontentsline{toc}{section}{\bibName}	% add the bibliography in the TOC
%		\bibliographystyle{babplain}				% style for the bibliography (babel style)
%		\bibliographystyle{babunsrt}				% style for the bibliography (babel style)
%		\bibliographystyle{ieeetr}					% style for the bibliography
		\bibliographystyle{plainnat}
		\bibliography{#1}							% bibtex file
		\thispagestyle{fancy}						% force header/footer
	}
