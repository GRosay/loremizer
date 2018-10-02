<?php

/**
 * 
 * Loremizer
 * v0.0.1
 * 
 * Loremizer is a small PHP object to quickly generate random content 
 * 
 * Author: Gaspard Rosay - http://twitter.com/GRosay92 
 * 
 * Apache-2.0 Licence
 * 
 */

namespace Loremizer;
class loremizer
{

    const MIN_PHRASE_LENGTH = 5;
    const MAX_PHRASE_LENGTH = 15;

    const MIN_PARAGRAPH_PHRASES = 3;
    const MAX_PARAGRAPH_PHRASES = 25;

    const MIN_TITLE_LENGTH = 1;
    const MAX_TITLE_LENGTH = 4;

    /**
     * Get a generated paragraph
     *
     * @param $n : number of phrases to get at the same time.
     * 
     * @return string
     */
    static public function getParagraph($n=2){
        $return = "";
        for($i=1;$i<=$n;$i++){
            $return .=  self::generateParagraph();
        }
        return trim($return);
    }

    /**
     * Get a generated phrase
     *
     * @param $n : number of phrases to get at the same time.
     * 
     * @return string
     */
    static public function getPhrase($n=1){
        $return = "";
        for($i=1;$i<=$n;$i++){
            $return .=  self::generatePhrase();
        }
        return trim($return);
    }

    /**
     * Get a generated title
     *
     * @return string
     */
    static public function getTitle($level = null){
        if($level != null){
            return "<".$level.">".self::generateTitle()."</".$level.">";
        }
        return  self::generateTitle();
    }

    static public function getImg($imgbalise=false, $width=800, $height=600){
        if($imgbalise){
            return "<img src='https://source.unsplash.com/random/".$width."x".$height."' />";
        }
        return "https://source.unsplash.com/random/".$width."x".$height;
    }

    /**
     * Generate a paragraph composed of multiples phrases
     *
     * @return string
     */
    static private function generateParagraph(){
        $length = rand(self::MIN_PHRASE_LENGTH, self::MAX_PHRASE_LENGTH);
        $paragraph = "";
        for($i=0;$i<$length;$i++){
            $paragraph .=  self::generatePhrase()." ";
        }
        return trim($paragraph);
    }

    /**
     * Generate a phrase from word list
     *
     * @return string
     */
    static private function generatePhrase(){
        $length = rand(self::MIN_PHRASE_LENGTH, self::MAX_PHRASE_LENGTH);
        $indexes = array_rand( self::WORDS, $length);
        $phrase = "";
        foreach($indexes as $i){            
            $phrase .=  self::WORDS[$i]." ";
        }
        $phrase = trim($phrase);
        $phrase = strtolower($phrase);
        $phrase = $phrase.".";
        $phrase[0] = strtoupper($phrase[0]);

        return $phrase;
    }

    /**
     * Generate a title from word list
     *
     * @return string
     */
    static private function generateTitle(){
        $length = rand(self::MIN_TITLE_LENGTH, self::MAX_TITLE_LENGTH);
        $indexes = array_rand( self::WORDS, $length);
        $phrase = "";
        if(is_array($indexes)){
            foreach($indexes as $i){            
                $phrase .=  self::WORDS[$i]." ";
            }
        } else {
            $phrase =  self::WORDS[$indexes];
        }

        $phrase = trim($phrase);
        $phrase = strtolower($phrase);
        $phrase[0] = strtoupper($phrase[0]);

        return $phrase;
    }


    // List of WORDS to use
    const WORDS = ['lorem', 'ipsum', 'dolor', 'sit', 'amet', 'abbas', 'abbatia', 'abduco', 'abeo', 'abscido', 'absconditus', 'absens', 'absorbeo', 'absque', 'abstergo', 'absum', 'abundans', 'abundantia', 'abutor', 'accedo', 'accendo', 'acceptus', 'accipio', 'accommodo', 'accusator', 'accuso', 'acer', 'acerbitas', 'acerbus', 'acervus', 'acidus', 'acies', 'acquiro', 'acsi', 'adamo', 'adaugeo', 'addo', 'adduco', 'ademptio', 'adeo', 'adeptio', 'adepto', 'adfectus', 'adfero', 'adficio', 'adflicto', 'adhaero', 'adhuc', 'adicio', 'adimpleo', 'adinventitias', 'adipiscor', 'adiuvo', 'administratio', 'admiratio', 'admiror', 'admitto', 'admoneo', 'admonitio', 'admoveo', 'adnuo', 'adopto', 'adsidue', 'adstringo', 'adsuesco', 'adsum', 'adsumo', 'adulatio', 'adulescens', 'adulescentia', 'adultus', 'aduro', 'advenio', 'adversus', 'adverto', 'advoco', 'aedificium', 'aeger', 'aegre', 'aegresco', 'aegretudo', 'aegrotatio', 'aegrus', 'aeneus', 'aequitas', 'aequus', 'aer', 'aestas', 'aestivus', 'aestus', 'aetas', 'aeternus', 'Affligeniensis', 'ager', 'aggero', 'aggredior', 'agnitio', 'agnosco', 'ago', 'ait', 'aiunt', 'Aldenard', 'alienus', 'alii', 'alioqui', 'alioquin', 'aliqua', 'aliquando', 'aliquanta', 'aliquanto', 'aliquantum', 'aliquantus', 'aliqui', 'aliquid', 'aliquis', 'aliquo', 'aliquot', 'aliquotiens', 'alius', 'allatus', 'alo', 'Alos', 'alter', 'altus', 'alveus', 'amaritudo', 'Ambianis', 'ambitus', 'ambulo', 'amicitia', 'amiculum', 'amicus', 'amissio', 'amita', 'amitto', 'amo', 'amor', 'amoveo', 'amplexus', 'amplitudo', 'amplus', 'ancilla', 'Andegavense', 'angelus', 'angulus', 'angustus', 'animadverto', 'animi', 'animus', 'annus', 'anser', 'ante', 'antea', 'antepono', 'antiquus', 'aperio', 'aperte', 'apostolus', 'apparatus', 'appareo', 'appello', 'appono', 'appositus', 'approbo', 'appropinquo', 'apto', 'aptus', 'apud', 'aqua', 'ara', 'aranea', 'arbitro', 'arbor', 'arbustum', 'arbustus', 'arca', 'arceo', 'arcesso', 'arcus', 'argentum', 'argumentum', 'arguo', 'arma', 'armarium', 'armo', 'aro', 'ars', 'articulus', 'artificiose', 'artificiosus', 'arto', 'arx', 'ascisco', 'ascit', 'asper', 'asperitas', 'aspicio', 'asporto', 'assentator', 'astrum', 'Asvesniis', 'atavus', 'ater', 'atqui', 'Atrebatum', 'atrocitas', 'atrox', 'attero', 'attollo', 'attonbitus', 'auctor', 'auctoritas', 'auctus', 'audacia', 'audacter', 'audax', 'audentia', 'audeo', 'audio', 'auditor', 'aufero', 'aureus', 'auris', 'Aurissiodorenses', 'aurum', 'aut', 'autem', 'autus', 'Auxatia', 'auxilium', 'avaritia', 'avarus', 'aveho', 'averto', 'Avesniis', 'avoco', 'baiulus', 'balbus', 'barba', 'bardus', 'basium', 'beatus', 'bellicus', 'bellum', 'bellus', 'bene', 'beneficium', 'benevolentia', 'benigne', 'Berlinmonte', 'bestia', 'bibo', 'bis', 'blandior', 'blanditia', 'Blesense', 'Boloniense', 'bonus', 'bos', 'Brabatensium', 'Brachants', 'brevis', 'brevitas', 'breviter', 'Brocherota', 'cado', 'caecus', 'caelestis', 'caelum', 'calamitas', 'calamus', 'calcar', 'calco', 'calculus', 'callide', 'callidus', 'Cameracum', 'campana', 'candidus', 'canis', 'canonicus', 'canonus', 'canto', 'capillus', 'capio', 'capitulus', 'capto', 'caput', 'carbo', 'carcer', 'careo', 'caries', 'cariosus', 'caritas', 'carmen', 'Carnotense', 'Carnutum', 'carpo', 'carus', 'casso', 'caste', 'Castellandum', 'casus', 'catena', 'caterva', 'catervatim', 'Cathalaunenses', 'cattus', 'cauda', 'causa', 'caute', 'cautela', 'caveo', 'cavus', 'cedo', 'celebrer', 'celebrus', 'celer', 'celeritas', 'celeriter', 'celo', 'cena', 'cenaculum', 'ceno', 'censura', 'centum', 'cerno', 'cernuus', 'certe', 'certo', 'certus', 'cervus', 'cetera', 'ceteri', 'ceterum', 'ceterus', 'charisma', 'chirographum', 'cibo', 'cibus', 'cicuta', 'cilicium', 'cimentarius', 'ciminatio', 'ciminosus', 'cinis', 'circumvenio', 'cito', 'civilis', 'civis', 'civitas', 'clam', 'clamo', 'clamor', 'claro', 'clarus', 'claudeo', 'claudo', 'claudus', 'claustrum', 'clementia', 'clibanus', 'coadunatio', 'coaegresco', 'coepi', 'coerceo', 'cogito', 'cognatus', 'cognomen', 'cognosco', 'cogo', 'cohaero', 'cohibeo', 'cohors', 'cohortor', 'colligo', 'colloco', 'collum', 'colo', 'color', 'coloratus', 'coloro', 'coma', 'combibo', 'comburo', 'comedo', 'comes', 'cometes', 'cometissa', 'comis', 'comitatus', 'comiter', 'comitto', 'commemoro', 'commeo', 'commessatio', 'comminor', 'comminuo', 'comminus', 'commisceo', 'commissum', 'commodo', 'commodum', 'commoneo', 'commoveo', 'communis', 'comparo', 'compater', 'compatior', 'compello', 'comperio', 'comperte', 'compes', 'competo', 'complectus', 'compleo', 'compono', 'compositio', 'compositus', 'comprehendo', 'comprobo', 'comprovincialis', 'comptus', 'conatus', 'concedo', 'concepta', 'concero', 'concido', 'concilium', 'concipio', 'concisus', 'concito', 'conculco', 'concupiscentia', 'concupisco', 'concutio', 'Condato', 'condico', 'conduco', 'confero', 'confestim', 'confido', 'confiteor', 'conforto', 'confugo', 'congregatio', 'congrego', 'congruus', 'conicio', 'coniecto', 'conitor', 'coniuratio', 'coniuratus', 'coniuro', 'conor', 'conqueror', 'conscendo', 'conscientia', 'conscindo', 'conscius', 'conservo', 'considero', 'consido', 'consilio', 'consilium', 'consisto', 'consitor', 'conspergo', 'conspicio', 'constans', 'constanter', 'constituo', 'consto', 'constringo', 'construo', 'constupator', 'constupro', 'consuasor', 'consuefacio', 'consuesco', 'consueta', 'consuetudo', 'consulatio', 'consulo', 'consulto', 'consultum', 'consummatio', 'consummo', 'consumo', 'consuo', 'consurgo', 'contabesco', 'contactus', 'contages', 'contagio', 'contamino', 'contego', 'contemno', 'contemplatio', 'contemplor', 'contemptim', 'contemptio', 'contemptus', 'contendo', 'contente', 'contentus', 'contigo', 'contineo', 'contingo', 'continuo', 'continuus', 'contra', 'contradictio', 'contrado', 'contraho', 'contristo', 'conturbo', 'conventus', 'conversatio', 'converto', 'convoco', 'copia', 'copiae', 'copiose', 'Corbeiam', 'cornu', 'corona', 'corpus', 'correptius', 'corrigo', 'corripio', 'corroboro', 'corrumpo', 'corruo', 'Corturiacum', 'coruscus', 'cotidie', 'Courtacum', 'crapula', 'cras', 'crastinus', 'creator', 'creatura', 'creber', 'crebro', 'credo', 'creo', 'creptio', 'crepusculum', 'cresco', 'creta', 'cribro', 'cribrum', 'crinis', 'crinitus', 'cruciamentum', 'crucio', 'crudelis', 'cruentus', 'crur', 'crustulum', 'crux', 'cubicularis', 'cubicularius', 'cubiculum', 'cubitum', 'cubo', 'cui', 'cuius', 'cuiusmodi', 'culpa', 'culpo', 'cultellus', 'cultura', 'cum', 'cunabula', 'cunae', 'cunctatio', 'cunctator', 'cunctor', 'cunctus', 'cupiditas', 'cupido', 'cupio', 'cuppedia', 'cupressus', 'cur', 'cura', 'curatio', 'curator', 'curia', 'curiositas', 'curiosus', 'curis', 'curo', 'curriculum', 'currus', 'cursim', 'cursito', 'curso', 'cursor', 'cursus', 'curto', 'Curtracus', 'curtus', 'curvo', 'curvus', 'custodia', 'custodiae', 'custos', 'damnatio', 'damno', 'dapifer', 'debeo', 'debilito', 'decens', 'decerno', 'decerto', 'decet', 'decimus', 'decipio', 'decor', 'decoro', 'decorus', 'decretum', 'decumbo', 'dedecor', 'dedecus', 'dedico', 'deduco', 'defaeco', 'defendo', 'defero', 'defessus', 'defetiscor', 'deficio', 'defigo', 'defleo', 'defluo', 'defungo', 'degenero', 'degero', 'degusto', 'deinde', 'delectatio', 'delecto', 'delego', 'deleo', 'delibero', 'delicate', 'deliciae', 'delinquo', 'deludo', 'demens', 'demergo', 'demitto', 'demo', 'demonstro', 'demoror', 'demulceo', 'demum', 'denego', 'denique', 'dens', 'denuncio', 'denuntio', 'denuo', 'deorsum', 'depereo', 'depono', 'depopulo', 'deporto', 'depraedor', 'deprecator', 'deprecor', 'deprehensio', 'deprimo', 'depromo', 'depulso', 'deputo', 'derelinquo', 'derideo', 'deripio', 'desidero', 'desidiosus', 'desino', 'desipio', 'desolo', 'desparatus', 'despecto', 'despero', 'despiciens', 'despicio', 'desposco', 'destinatus', 'destituo', 'detego', 'determino', 'detineo', 'detrimentum', 'deus', 'devenio', 'devito', 'devoco', 'devotio', 'devoveo', 'dexter', 'dextera', 'diabolus', 'dico', 'dictata', 'dictator', 'dictito', 'dicto', 'didicerat', 'didico', 'dido', 'dies', 'diffama', 'differo', 'differtus', 'difficilis', 'difficultas', 'digestor', 'dignitas', 'dignosco', 'dignus', 'digredior', 'digressio', 'digressus', 'dilabor', 'dilato', 'dilgenter', 'diligens', 'diligentia', 'diligo', 'diluculo', 'diluo', 'dimidium', 'dimitto', 'directus', 'diripio', 'dirunitas', 'diruo', 'discedo', 'discidium', 'discipulus', 'disco', 'discrepo', 'dispono', 'disputatio', 'disputo', 'dissero', 'dissimilis', 'dissimulo', 'dissolutus', 'distinguo', 'distribuo', 'districtus', 'distulo', 'dito', 'diu', 'diutinus', 'diutius', 'diuturnus', 'diversus', 'dives', 'divinitus', 'divinus', 'divitiae', 'doceo', 'doctor', 'doctrina', 'doctus', 'dolens', 'doleo', 'dolor', 'dolose', 'dolosus', 'dolus', 'domesticus', 'domina', 'dominatus', 'dominus', 'domito', 'domus', 'donec', 'donum', 'dormio', 'dubito', 'dubium', 'duco', 'dudum', 'dulcedo', 'dulcidine', 'dulcis', 'dulcitudo', 'dummodo', 'dumtaxat', 'duo', 'duro', 'durus', 'Dusiol', 'dux', 'eatenus', 'ebullio', 'ecclesia', 'econtra', 'ecquando', 'edico', 'editio', 'edo', 'edoceo', 'educo', 'effectus', 'effero', 'effervo', 'efficio', 'effringo', 'effugio', 'effundo', 'egenus', 'egeo', 'ego', 'egredior', 'eicio', 'elatus', 'electus', 'elementum', 'elemosina', 'elemosinarius', 'eligo', 'eloquens', 'eloquentia', 'eluo', 'eluvies', 'eluvio', 'emanio', 'emendo', 'emercor', 'emerio', 'emineo', 'eminor', 'eminus', 'emiror', 'emo', 'emoveo', 'emptio', 'enim', 'enumero', 'episcopalis', 'episcopus', 'epistula', 'epulo', 'epulor', 'eques', 'equidem', 'equitatus', 'equus', 'erepo', 'erga', 'ergo', 'eripio', 'erogo', 'erro', 'error', 'erubesco', 'erudio', 'eruo', 'esurio', 'etenim', 'etiam', 'etsi', 'evenio', 'eventus', 'everto', 'evito', 'evoco', 'exaequo', 'excedo', 'excellentia', 'excessum', 'excipio', 'excito', 'exclamo', 'excludo', 'excolo', 'excrucio', 'excusatio', 'excuso', 'exemplar', 'exemplum', 'exerceo', 'exercitus', 'exertus', 'exesto', 'exheredo', 'exheres', 'exhibeo', 'exhilaro', 'exhorresco', 'exigo', 'exilis', 'eximietate', 'eximius', 'eximo', 'exinde', 'exitiabilis', 'exitium', 'exitus', 'exordium', 'exorior', 'exoro', 'exorsus', 'expedio', 'expello', 'experior', 'expers', 'expetens', 'expeto', 'expilatio', 'expiscor', 'expleo', 'expletio', 'expletus', 'explicatus', 'explico', 'expono', 'expositus', 'expostulo', 'expugno', 'exquisitus', 'exsequor', 'exsertus', 'exsilium', 'exspecto', 'exstinguo', 'exsto', 'externus', 'extollo', 'extorqueo', 'extra', 'extremus', 'exturbo', 'exulto', 'exuro', 'exustio', 'fabula', 'facile', 'facilis', 'facillimus', 'facina', 'facio', 'factum', 'facultas', 'facundia', 'facunditas', 'faenum', 'falsus', 'fama', 'familia', 'familiaris', 'famulatus', 'famulus', 'fas', 'fateor', 'fatigo', 'fatum', 'fautor', 'faveo', 'feculentia', 'fefello', 'feliciter', 'felix', 'femina', 'fenestra', 'fere', 'feretrum', 'feritas', 'ferme', 'fero', 'ferrum', 'ferus', 'festinatio', 'festino', 'festinus', 'feteo', 'ficus', 'fidelis', 'fidelitas', 'fidens', 'fides', 'fiducia', 'filia', 'filius', 'fimus', 'fines', 'finis', 'finitimus', 'fio', 'firmo', 'firmus', 'flamma', 'flatus', 'flax', 'fleo', 'fluctus', 'flumen', 'fluo', 'fodio', 'fore', 'forensis', 'forma', 'formica', 'formo', 'fors', 'forsit', 'fortasse', 'forte', 'fortis', 'fortiter', 'fortitudo', 'fortuna', 'fortunate', 'fortunatus', 'forum', 'foveo', 'frango', 'frater', 'frendo', 'frequentatio', 'frequentia', 'frequento', 'frigus', 'frons', 'fructuarius', 'fructus', 'frugalitas', 'frumentum', 'fruor', 'frustra', 'frux', 'fuga', 'fugio', 'fugitivus', 'fugo', 'fulcio', 'fulgeo', 'fultus', 'fundo', 'fungor', 'funis', 'furibundus', 'furor', 'furs', 'furtificus', 'furtim', 'furtum', 'fusus', 'galea', 'Gandavum', 'gaudium', 'Gemblacensis', 'gemo', 'gens', 'genus', 'gero', 'gesto', 'gestum', 'gigno', 'glacialis', 'gladius', 'gloria', 'glorior', 'grando', 'grassor', 'gratia', 'gratulor', 'gratus', 'gravatus', 'gravis', 'gravitas', 'graviter', 'gravo', 'gregatim', 'gusto', 'habeo', 'habitus', 'hac', 'hactenus', 'hae', 'haec', 'hanc', 'harum', 'has', 'Hasnonium', 'haud', 'Helcim', 'Helnonensis', 'Heniis', 'hereditas', 'hesito', 'hic', 'hilaris', 'hinc', 'his', 'hoc', 'hodie', 'hodiernus', 'Hoienses', 'homo', 'honor', 'honorabilis', 'hora', 'hordeum', 'horrendus', 'hortor', 'hortus', 'horum', 'hos', 'hospes', 'hostes', 'hostis', 'huic', 'huius', 'humanitas', 'humanus', 'humilis', 'humo', 'humus', 'hunc', 'Hunnam', 'hypocrita', 'iaceo', 'iacio', 'iaculator', 'iaculum', 'iam', 'ianua', 'ibi', 'ictus', 'idcirco', 'idem', 'identidem', 'ideo', 'idoneus', 'igitur', 'ignarus', 'ignavus', 'ignis', 'ignoro', 'ignosco', 'ignotus', 'ilico', 'illa', 'illacrimo', 'illae', 'illarum', 'illas', 'illata', 'illaturos', 'ille', 'illi', 'illiam', 'illic', 'illis', 'illius', 'illo', 'illorum', 'illos', 'illuc', 'illud', 'illudo', 'illum', 'imago', 'imber', 'imbrium', 'imcomposite', 'imitabilis', 'imitor', 'immanitas', 'immerito', 'immineo', 'immo', 'immodicus', 'immortalis', 'immotus', 'immunda', 'immundus', 'impedimentum', 'impedio', 'impedito', 'impedo', 'impello', 'impendeo', 'impendium', 'impendo', 'impenetrabiilis', 'impensa', 'imperator', 'imperceptus', 'imperiosus', 'imperium', 'impero', 'impetro', 'impetus', 'impleo', 'importo', 'importunus', 'impraesentiarum', 'imprimis', 'improbus', 'improvidus', 'improviso', 'impudens', 'impudenter', 'impunitus', 'imputo', 'inanis', 'incassum', 'inceptor', 'inceptum', 'incertus', 'incido', 'incipio', 'incito', 'inclino', 'includo', 'inclutus', 'incola', 'incompositus', 'inconsulte', 'incontinencia', 'incorruptus', 'incredibilis', 'increpare', 'increpo', 'incubo', 'incurro', 'Inda', 'indagatio', 'inde', 'indebitus', 'indico', 'indigeo', 'indignatio', 'indignus', 'indo', 'indomitus', 'induco', 'industria', 'industrius', 'indutiae', 'inedicabilis', 'ineptio', 'inexpugnabilis', 'infamo', 'infantia', 'infector', 'infectum', 'infectus', 'infecunditas', 'infecundus', 'infelicitas', 'infeliciter', 'infelix', 'infenso', 'infensus', 'inferi', 'inferne', 'infero', 'inferus', 'infervesco', 'infeste', 'infesto', 'infestus', 'inficio', 'infidelis', 'infidelitas', 'infideliter', 'infidus', 'infigo', 'infindo', 'infinitas', 'infinitus', 'infirmatio', 'infirme', 'infirmitas', 'infirmo', 'infirmus', 'infit', 'infitialis', 'infitias', 'infitior', 'inflammatio', 'inflammo', 'inflatio', 'inflatius', 'inflatus', 'inflecto', 'infletus', 'inflexio', 'inflexus', 'infligo', 'inflo', 'influo', 'infodio', 'informatio', 'informis', 'infortunatus', 'infortunium', 'infra', 'infula', 'ingemuo', 'ingenium', 'ingens', 'ingero', 'ingratus', 'ingravesco', 'inicio', 'inimicus', 'iniquus', 'initium', 'iniuria', 'iniustus', 'innotesco', 'innuo', 'inolesco', 'inops', 'inquam', 'inquis', 'inquit', 'inrideo', 'inritus', 'inruo', 'insania', 'insciens', 'inscribo', 'insensatus', 'insequor', 'inservio', 'insideo', 'insidiae', 'insinuo', 'insisto', 'insolita', 'insolitus', 'insons', 'insperatus', 'instanter', 'instar', 'instigo', 'instituo', 'insto', 'instructus', 'instruo', 'Insula', 'insurgo', 'integer', 'intellego', 'intempestivus', 'intendo', 'intentio', 'intentus', 'inter', 'intercipio', 'interdico', 'interdum', 'intereo', 'interficio', 'interrogatio', 'intro', 'introduco', 'intueor', 'intumesco', 'intus', 'inultus', 'invado', 'invalesco', 'invenio', 'inventor', 'investigo', 'inveteratus', 'invetero', 'invicem', 'invictus', 'invideo', 'invidia', 'inviso', 'invisus', 'invito', 'invitus', 'ioco', 'iocus', 'ipse', 'ipsemet', 'ira', 'irascor', 'iratus', 'irrito', 'irritum', 'irritus', 'iste', 'ita', 'itaque', 'iter', 'itero', 'iterum', 'iubeo', 'iucunditas', 'iucundus', 'iudex', 'iudicium', 'iudico', 'iugis', 'iumentum', 'iungo', 'iuro', 'ius', 'iussu', 'iustus', 'iuvo', 'iuxta', 'jaculum', 'judicium', 'jugis', 'jugiter', 'jumentum', 'juvenis', 'juventus', 'labefacio', 'labefacto', 'labellum', 'labes', 'labia', 'labiosus', 'labo', 'labor', 'labores', 'laboriose', 'laboriosus', 'laboro', 'labrum', 'labrusca', 'labruscum', 'lac', 'lacer', 'laceratio', 'lacero', 'lacerta', 'lacertosus', 'lacertus', 'lacesso', 'lacrima', 'lacrimabilis', 'lacrimo', 'lacrimosus', 'lactans', 'lactatio', 'lacteus', 'lacto', 'lactuca', 'lacuna', 'lacunar', 'lacus', 'laedo', 'laesio', 'laetabilis', 'laetans', 'laetatio', 'laetifico', 'laetificus', 'laetitia', 'laeto', 'laetor', 'laeve', 'laevus', 'laganum', 'lama', 'lambo', 'lamenta', 'lamentabilis', 'lamentatio', 'lamentor', 'lamia', 'lamnia', 'lapsus', 'laqueum', 'laqueus', 'largior', 'lascivio', 'lasesco', 'latus', 'laudator', 'laudo', 'Laudunum', 'laus', 'lebes', 'lectica', 'lector', 'lectus', 'legatarius', 'legatus', 'legens', 'legio', 'lego', 'lemiscus', 'lemma', 'lemures', 'lenimentus', 'lenio', 'lenis', 'lenitas', 'leno', 'lenocinium', 'lenocinor', 'lens', 'lente', 'lentesco', 'lentitudo', 'lento', 'lentulus', 'lentus', 'Leo', 'Leodie', 'lepide', 'lepidus', 'lepor', 'lepus', 'Lesciense', 'letalis', 'letaliter', 'letanie', 'lethargus', 'letifer', 'leto', 'letum', 'levamen', 'levamentum', 'levatio', 'leviculus', 'levidensis', 'levis', 'levitas', 'leviter', 'levo', 'lex', 'libatio', 'libellus', 'libenter', 'liber', 'liberalis', 'liberalitas', 'liberaliter', 'liberatio', 'libere', 'libero', 'libertas', 'libido', 'licet', 'ligo', 'lima', 'limen', 'lingua', 'lino', 'linteum', 'liquidus', 'litigo', 'littera', 'litterae', 'loci', 'loco', 'locupleto', 'locus', 'loginquitas', 'longe', 'longus', 'loquax', 'loquor', 'loricatus', 'lubricus', 'lucerna', 'lucror', 'lucrosus', 'lucrum', 'luctisonus', 'luctus', 'ludio', 'ludo', 'ludus', 'lues', 'lugeo', 'luna', 'lupus', 'Lutosensis', 'lux', 'luxuria', 'macellarius', 'macer', 'macero', 'macies', 'macresco', 'mactabilis', 'macto', 'macula', 'maculo', 'maculosus', 'madesco', 'madide', 'madidus', 'mador', 'maero', 'maeror', 'magis', 'magister', 'magnopere', 'magnus', 'magus', 'maiestas', 'maiores', 'Malbodiensis', 'male', 'malens', 'Malmundarium', 'malo', 'malum', 'malus', 'mancipo', 'mandatum', 'mando', 'mane', 'manentia', 'maneo', 'mansuetus', 'manus', 'Marceniense', 'Marcieniensis', 'mare', 'maritus', 'mater', 'matera', 'materia', 'matertera', 'matrimonium', 'maxime', 'medicus', 'mediocris', 'meditor', 'medius', 'mei', 'mel', 'melior', 'mellitus', 'membrana', 'memini', 'memor', 'memoratus', 'memoria', 'Menapiorum', 'mendosus', 'mens', 'mensa', 'mensis', 'merces', 'mereo', 'meretrix', 'meridianus', 'mestitia', 'Metim', 'metuo', 'metus', 'meus', 'mica', 'mihi', 'miles', 'milia', 'militaris', 'mille', 'millies', 'minime', 'minimus', 'ministro', 'minor', 'minuo', 'mire', 'miro', 'miror', 'mirus', 'misceo', 'miser', 'misere', 'misereo', 'misericordia', 'missa', 'mitesco', 'mitigo', 'mitis', 'mitto', 'modestus', 'modica', 'modicus', 'modio', 'modo', 'modus', 'Moguntienses', 'moleste', 'molestia', 'molestus', 'molior', 'mollio', 'mollis', 'monachus', 'Monasteriense', 'monasterium', 'moneo', 'monitio', 'mons', 'monstro', 'monstrum', 'Montensem', 'mora', 'moratlis', 'morbus', 'mores', 'morior', 'mors', 'morsus', 'mortifera', 'mortuus', 'mos', 'moveo', 'mox', 'mucro', 'mugio', 'mulier', 'multi', 'multo', 'multum', 'multus', 'mundo', 'mundus', 'munero', 'munimentum', 'munio', 'munitio', 'munus', 'mus', 'mussito', 'mutatio', 'muto', 'mutuo', 'mutuus', 'Namucense', 'narro', 'nascor', 'natalis', 'natio', 'natura', 'nauta', 'navigatio', 'navigo', 'navis', 'necdum', 'necessarius', 'necesse', 'necne', 'neco', 'nefas', 'nego', 'negotium', 'nemo', 'neo', 'nepos', 'nequam', 'nequaquam', 'neque', 'nequeo', 'nequitia', 'nescio', 'nichilominus', 'nidor', 'niger', 'nihil', 'nihilum', 'nimirum', 'nimis', 'nimium', 'nisi', 'niteo', 'nitesco', 'nitor', 'Nivellensem', 'niveus', 'nobis', 'nocens', 'noceo', 'nolo', 'nomen', 'nominatim', 'nomine', 'non', 'nondum', 'nonnisi', 'nonnullus', 'nonnumquam', 'nonus', 'nos', 'nosco', 'noster', 'nota', 'notarius', 'novem', 'novitas', 'novo', 'novus', 'nox', 'nullus', 'numerus', 'numquam', 'nunc', 'nunquam', 'nuntio', 'nuntius', 'nuper', 'nusquam', 'nutrimens', 'nutrimentus', 'nutrio', 'nutus', 'obdormio', 'obduro', 'obicio', 'obligatus', 'obliquo', 'oblittero', 'oblivio', 'obruo', 'obsequium', 'obstinatus', 'obtestor', 'obtineo', 'obviam', 'obvius', 'occasio', 'occido', 'occulto', 'occupo', 'occurro', 'occursus', 'ocius', 'oculus', 'odio', 'odium', 'offensio', 'offero', 'officina', 'officium', 'olim', 'omitto', 'omnigenus', 'omnino', 'omnipotens', 'omnis', 'onero', 'onus', 'opera', 'operor', 'opes', 'opinio', 'opisthotonos', 'oporotheca', 'oportet', 'oportunitas', 'oppono', 'opportune', 'opportunitas', 'opportunitatus', 'opportunus', 'opprimo', 'opprobrium', 'oppugno', 'ops', 'optimates', 'optimus', 'opto', 'opus', 'oratio', 'orator', 'orbis', 'ordinatio', 'ordine', 'ordo', 'orior', 'ornatus', 'orno', 'oro', 'ostendo', 'ostium', 'otium', 'ovis', 'paciscor', 'pactum', 'pactus', 'paene', 'paganus', 'pala', 'palam', 'palea', 'pallium', 'palma', 'pando', 'panis', 'par', 'paratus', 'parco', 'parens', 'pareo', 'paries', 'parilis', 'pario', 'pariter', 'paro', 'pars', 'partim', 'parum', 'parvus', 'pasco', 'passer', 'passim', 'patefacio', 'pateo', 'pater', 'paternus', 'patiens', 'patientia', 'patior', 'patria', 'patrocinor', 'patronus', 'patruus', 'pauci', 'paulatim', 'pauper', 'paupertas', 'pax', 'peccatus', 'pecco', 'pecto', 'pectus', 'pecunia', 'pecus', 'peior', 'pello', 'pendeo', 'pendo', 'penitus', 'penus', 'pepulo', 'per', 'peracto', 'peragro', 'percipio', 'percontor', 'perculsus', 'percutio', 'perdignus', 'perdo', 'perduco', 'peregrinus', 'pereo', 'perfectus', 'perfero', 'perficio', 'perfruor', 'perfusus', 'pergo', 'periclitatus', 'periclitor', 'periculosus', 'periculum', 'perimo', 'peritus', 'periurium', 'perlustro', 'permitto', 'permoveo', 'perniciosus', 'perperam', 'perpetro', 'perpetuus', 'perscitus', 'perscribo', 'perseco', 'persequor', 'perseverantia', 'persevero', 'persisto', 'persolvo', 'personam', 'perspicuus', 'persuadeo', 'perterreo', 'pertimesco', 'pertinacia', 'pertinaciter', 'pertinax', 'pertineo', 'pertingo', 'pertorqueo', 'pertraho', 'perturbo', 'perturpis', 'peruro', 'pervalidus', 'pervenio', 'perverto', 'pervideo', 'pes', 'pessimus', 'pessum', 'pestifer', 'pestifere', 'pestis', 'petitus', 'peto', 'Pevela', 'pharetra', 'phasma', 'phitonicum', 'pia', 'pica', 'picea', 'pictor', 'pictoratus', 'piger', 'pignus', 'piper', 'pipio', 'pirum', 'pirus', 'piscator', 'piscis', 'pius', 'placeo', 'placet', 'placide', 'placidus', 'placitum', 'placo', 'plaga', 'plagiarius', 'plane', 'plango', 'platea', 'plaustrum', 'plebs', 'plecto', 'plector', 'plene', 'plenus', 'plerumque', 'plerusque', 'plico', 'plorabilis', 'plorator', 'ploratus', 'ploro', 'pluit', 'pluma', 'plumbeus', 'plumbum', 'pluo', 'plura', 'plures', 'plurimi', 'plurimus', 'pluris', 'plus', 'plusculus', 'pluvia', 'pluvialis', 'pocius', 'poema', 'poena', 'poeta', 'polenta', 'pollen', 'polleo', 'pollex', 'polliceor', 'pollicitus', 'pomum', 'pono', 'pons', 'poposco', 'populus', 'porro', 'porta', 'posco', 'positus', 'possessio', 'possum', 'post', 'postea', 'posteri', 'posterus', 'posthabeo', 'postpono', 'postquam', 'postulo', 'potens', 'potestas', 'potior', 'potissimum', 'potissimus', 'potius', 'prae', 'praebeo', 'praecedo', 'praecelsus', 'praecepio', 'praeceptum', 'praecido', 'praecipio', 'praecipuus', 'praeclarus', 'praeconor', 'praecox', 'praeda', 'praedico', 'praeeo', 'praefero', 'praeficio', 'praefinio', 'praefoco', 'praegravo', 'praemitto', 'praemium', 'praemo', 'praenuntio', 'praenuntius', 'praepono', 'praepositus', 'praeproperus', 'praesentia', 'praesidium', 'praestans', 'praestantia', 'praesto', 'praesul', 'praesum', 'praesumo', 'praeter', 'praeterea', 'praetereo', 'praeteritus', 'praetermissio', 'praetorgredior', 'praevenio', 'pravitas', 'preastolatio', 'precipio', 'precipue', 'precor', 'prehendo', 'premo', 'prenda', 'pretereo', 'pretium', 'prevenire', 'prex', 'primitus', 'primo', 'primoris', 'primum', 'princeps', 'principatus', 'principium', 'prior', 'priores', 'priscus', 'pristinus', 'prius', 'priusquam', 'privatus', 'privigna', 'privo', 'privus', 'pro', 'probitas', 'probo', 'procedo', 'procella', 'procer', 'procinctu', 'procul', 'procurator', 'prodigiosus', 'proditor', 'proelium', 'profecto', 'profero', 'proficio', 'proficiscor', 'proficuus', 'profiteor', 'profor', 'profugus', 'profundo', 'profundum', 'profundus', 'progener', 'progenero', 'progenies', 'progenitor', 'progigno', 'prognatus', 'progredior', 'progressio', 'progressus', 'prohibeo', 'prohibitio', 'proicio', 'proinde', 'prolabor', 'prolapsio', 'prolatio', 'prolato', 'prolecto', 'proles', 'proletarius', 'prolicio', 'prolix', 'prolixus', 'proloquor', 'proluo', 'prolusio', 'proluvier', 'promereo', 'promeritum', 'prominens', 'promineo', 'promisce', 'promiscus', 'promissio', 'promissor', 'promitto', 'promo', 'promontorium', 'promoveo', 'prompte', 'promptu', 'promptus', 'promulgatio', 'promus', 'promutuus', 'pronepos', 'pronuntio', 'prope', 'propello', 'propero', 'propinquo', 'propinquus', 'propono', 'propositum', 'proprie', 'proprius', 'propter', 'propugnaculum', 'prorsus', 'prosequor', 'prosper', 'prosperitas', 'prosum', 'protestor', 'protinus', 'protraho', 'prout', 'provectus', 'proveho', 'proventus', 'provideo', 'provisor', 'provolvere', 'proximus', 'prudens', 'prudenter', 'prudentia', 'Pruma', 'publicus', 'puchre', 'pudendus', 'pudeo', 'pudicus', 'pudor', 'puella', 'puer', 'puerilis', 'pueriliter', 'puga', 'pugna', 'pugnacitas', 'pugnaculum', 'pugnax', 'pugno', 'pugnus', 'pulchellus', 'pulcher', 'pulchritudo', 'pulex', 'pullulo', 'pullus', 'pulmentum', 'pulmo', 'pulpa', 'pulpitum', 'pulso', 'pulsus', 'pulvis', 'pumilius', 'punctum', 'pungo', 'puniceus', 'punio', 'punitor', 'pupa', 'pupillus', 'puppis', 'pupula', 'purgamentum', 'purgatio', 'purgo', 'purpura', 'purus', 'pusillus', 'putator', 'puteo', 'puter', 'putesco', 'puteus', 'puto', 'putus', 'pyropus', 'pyus', 'qua', 'quadraginta', 'quadratus', 'quadrigae', 'quadrivium', 'quadrum', 'quadruplator', 'quadruplor', 'quae', 'quaero', 'quaesitio', 'quaeso', 'quaestio', 'quaestuosus', 'quaestus', 'qualis', 'qualiscumque', 'qualislibet', 'qualitas', 'qualiter', 'quam', 'quamdiu', 'quamobrem', 'quamquam', 'quamtotius', 'quamvis', 'quando', 'quandoquidem', 'quanti', 'quanto', 'quantocius', 'quantum', 'quantus', 'quantuscumque', 'quantuslibet', 'quantuvis', 'quapropter', 'quare', 'quartus', 'quarum', 'quas', 'quasi', 'quassatio', 'quasso', 'quatenus', 'quater', 'quattuor', 'quem', 'quemadmodum', 'queo', 'quercetum', 'quercus', 'quereia', 'queribundus', 'querimonia', 'queritor', 'quernus', 'queror', 'querulus', 'qui', 'quia', 'quibus', 'quicquid', 'quid', 'quidam', 'quidem', 'quies', 'quilibet', 'quin', 'quinam', 'quingenti', 'quinquennis', 'quippe', 'quisnam', 'quisquam', 'quisque', 'quisquis', 'quo', 'quod', 'quodammodo', 'quomodo', 'quondam', 'quoniam', 'quoque', 'quorum', 'quos', 'quot', 'quotiens', 'quotienscumque', 'quovis', 'radicitus', 'rapio', 'rarus', 'ratio', 'recedo', 'recipio', 'recito', 'recognosco', 'recolo', 'reconcilio', 'recondo', 'recordatio', 'recordor', 'recro', 'rectum', 'rectus', 'recuperatio', 'recupero', 'recuso', 'redarguo', 'reddo', 'redemptio', 'redemptor', 'redeo', 'redigo', 'redono', 'reduco', 'redundantia', 'redundo', 'refectorium', 'refero', 'reformo', 'regina', 'regius', 'regnum', 'rego', 'regula', 'relaxo', 'relego', 'relevo', 'relictus', 'relinquo', 'reliquum', 'relucesco', 'reluctor', 'remando', 'remaneo', 'rememdium', 'removeo', 'remuneror', 'renuntio', 'renuo', 'rependo', 'repens', 'repente', 'repere', 'reperio', 'repetitio', 'repeto', 'repleo', 'repletus', 'repo', 'repono', 'reprehendo', 'repugno', 'requiesco', 'requiro', 'res', 'resisto', 'respicio', 'respondeo', 'restituo', 'resumo', 'retineo', 'retraho', 'retribuo', 'reus', 'revenio', 'reverto', 'revertor', 'revoco', 'revolvo', 'rex', 'rhetor', 'rhetoricus', 'rideo', 'rigor', 'ritus', 'rogo', 'rostrum', 'rota', 'Rotomagense', 'rotundus', 'rubor', 'rudimentum', 'rumor', 'ruo', 'rursus', 'rus', 'rusticus', 'sabbatum', 'sacculus', 'sacrificum', 'sacrilegus', 'saepe', 'saepenumero', 'saepius', 'saeta', 'saevio', 'sal', 'salsus', 'saltem', 'salus', 'saluto', 'salutor', 'salveo', 'salvus', 'sanctifico', 'sanctimonia', 'sanctimonialis', 'Sanctus', 'sane', 'sanitas', 'sano', 'Santiago', 'sanus', 'sapiens', 'sapienter', 'sapientia', 'sarcina', 'satago', 'satio', 'satis', 'sato', 'satura', 'saturo', 'scaber', 'scabies', 'Scaldus', 'scamnum', 'scaphium', 'sceleratus', 'scelero', 'scelestus', 'scelus', 'schola', 'scientia', 'scilicet', 'scindo', 'scio', 'scisco', 'scribo', 'scrinium', 'scriptor', 'secedo', 'secerno', 'secundum', 'secundus', 'securus', 'secus', 'secuutus', 'sed', 'sedeo', 'seditio', 'sedo', 'seductor', 'semel', 'semper', 'senectus', 'senex', 'sensus', 'sententia', 'sentio', 'seorsum', 'sepelio', 'septem', 'sepulchrum', 'seputus', 'sequax', 'sequor', 'serio', 'serius', 'sermo', 'sero', 'servio', 'servitus', 'servo', 'servus', 'sese', 'severitas', 'sibimet', 'sic', 'siccus', 'Siclinium', 'sicut', 'sidus', 'signum', 'silens', 'silenti', 'silentium', 'sileo', 'siligo', 'silva', 'similis', 'similitudo', 'simplex', 'simul', 'simulatio', 'sine', 'singularis', 'singuli', 'singultim', 'singultus', 'singulus', 'sino', 'siquidem', 'sitio', 'sitis', 'sive', 'socer', 'socius', 'sodalitas', 'sol', 'soleo', 'solio', 'solitudo', 'solium', 'sollers', 'sollicito', 'sollicitudo', 'sollicitus', 'solum', 'solus', 'solutio', 'solvo', 'somniculosus', 'somniculouse', 'somnio', 'somnium', 'somnus', 'sonitus', 'sono', 'sophismata', 'sopor', 'sordeo', 'sordes', 'sordesco', 'sortitus', 'spargo', 'speciosus', 'spectaculum', 'specto', 'speculum', 'specus', 'sperno', 'spero', 'spes', 'spiculum', 'spiritus', 'spoliatio', 'spolio', 'spolium', 'sponte', 'stabilis', 'stabilitas', 'Stabulaus', 'statim', 'statua', 'statuo', 'stella', 'stillicidium', 'stipes', 'stips', 'sto', 'strenuus', 'strues', 'studio', 'studiose', 'studium', 'stultus', 'suadeo', 'suasoria', 'sub', 'subito', 'subitus', 'subiungo', 'sublime', 'subnecto', 'subseco', 'subsequor', 'substantia', 'subvenio', 'succedo', 'succendo', 'successio', 'succurro', 'sufficio', 'suffoco', 'suffragium', 'suggero', 'sui', 'sulum', 'sum', 'summa', 'summisse', 'summissus', 'summopere', 'sumo', 'sumptus', 'supellex', 'super', 'superbia', 'superbus', 'superficies', 'superfluo', 'superna', 'superne', 'supernus', 'supero', 'supersum', 'superus', 'supervacuus', 'suppellex', 'supplanto', 'supplex', 'supplicium', 'suppono', 'supra', 'surculus', 'surgo', 'sursum', 'suscipio', 'suscito', 'suspendo', 'sustineo', 'suus', 'synagoga', 'tabella', 'tabellae', 'tabernus', 'tabesco', 'tabgo', 'tabula', 'taceo', 'tactus', 'taedium', 'talio', 'talis', 'talus', 'tam', 'tamdiu', 'tamen', 'tametsi', 'tamisium', 'tamquam', 'tandem', 'tantillus', 'tantum', 'tantummodo', 'tantus', 'tardus', 'Taruennam', 'tego', 'temeritas', 'temperantia', 'tempero', 'tempestas', 'Templovium', 'templum', 'temptatio', 'tempus', 'tenax', 'tendo', 'teneo', 'tener', 'tenuis', 'tenus', 'tepesco', 'tepidus', 'ter', 'terebro', 'teres', 'terga', 'tergeo', 'tergiversatio', 'tergo', 'tergum', 'tergus', 'termes', 'terminatio', 'termino', 'terminus', 'tero', 'terra', 'terreo', 'territo', 'terror', 'tersus', 'tertius', 'testimonium', 'testis', 'texo', 'textilis', 'textor', 'textus', 'thalassinus', 'theatrum', 'theca', 'thema', 'theologus', 'thermae', 'thesaurus', 'thesis', 'thorax', 'thymbra', 'thymum', 'tibi', 'timeo', 'timidus', 'timor', 'titulus', 'tolero', 'tollo', 'tondeo', 'tonsor', 'Tornacense', 'torqueo', 'torrens', 'tot', 'totidem', 'toties', 'totus', 'tracto', 'trado', 'traho', 'Traiectensium', 'Traiectum', 'trans', 'transeo', 'transfero', 'transmitto', 'tredecim', 'Trellum', 'tremo', 'trepide', 'tres', 'Treverim', 'tribuo', 'tricesimus', 'triduana', 'triduanus', 'triduum', 'triginta', 'tripudio', 'tristis', 'Trium', 'triumphus', 'trucido', 'truculenter', 'tubineus', 'tui', 'tum', 'tumultus', 'tumulus', 'tunc', 'Tungris', 'turba', 'turbatio', 'turbatus', 'turbo', 'turpe', 'turpis', 'tutamen', 'tutis', 'tyrannus', 'uberrime', 'ubi', 'ulciscor', 'ullus', 'ulterius', 'ultio', 'ultra', 'umbra', 'umerus', 'umquam', 'una', 'unde', 'undique', 'universe', 'universi', 'universitas', 'universum', 'universus', 'unus', 'urbanus', 'urbs', 'uredo', 'usitas', 'usque', 'ustilo', 'ustulo', 'usus', 'uter', 'uterque', 'Uticensium', 'utilis', 'utilitas', 'utique', 'utor', 'utpote', 'utrimque', 'utroque', 'utrum', 'uxor', 'vaco', 'vacuus', 'vado', 'vae', 'valde', 'valens', 'valeo', 'valetudo', 'validus', 'vallum', 'vapulus', 'varietas', 'varius', 'vehemens', 'vehementer', 'vel', 'velociter', 'velox', 'velum', 'velut', 'Vendolius', 'venia', 'venio', 'ventito', 'ventosus', 'ventus', 'venustas', 'ver', 'verbera', 'verbum', 'vere', 'verecundia', 'vereor', 'vergo', 'veritas', 'Vernandense', 'vero', 'versus', 'verto', 'verumtamen', 'verus', 'vesco', 'vesica', 'vesper', 'vespera', 'vespillo', 'vester', 'vestigium', 'vestio', 'vestis', 'vestrum', 'vetus', 'via', 'vicinus', 'vicissitudo', 'victor', 'victoria', 'victus', 'videlicet', 'video', 'videor', 'viduata', 'viduo', 'vigilo', 'vigor', 'vilicus', 'vilis', 'vilitas', 'villa', 'vinco', 'vinculum', 'vindico', 'vinitor', 'vinum', 'vir', 'virga', 'virgo', 'viridis', 'viriliter', 'virtus', 'vis', 'viscus', 'vita', 'vitiosus', 'vitium', 'vito', 'vivo', 'vix', 'vobis', 'vociferor', 'voco', 'volaticus', 'volatilis', 'volens', 'volo', 'volubilis', 'volubiliter', 'voluntarius', 'voluntas', 'volup', 'voluptarius', 'voluptas', 'voluptuosus', 'volutabrum', 'volva', 'vomer', 'vomica', 'vomito', 'vorago', 'vorax', 'voro', 'vos', 'votum', 'voveo', 'vox', 'vulariter', 'vulgaris', 'vulgivagus', 'vulgo', 'vulgus', 'vulnero', 'vulnus', 'vulpes', 'vulticulus', 'vultuosus', 'vultur', 'vultus', 'Werumensium', 'xiphias'];
    

}