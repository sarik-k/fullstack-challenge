export function useWMO() {
    function getDescription(code) {
        let text = "";
        switch (code) {
            case 0:
                text = 'Clear sky';
                break;
            case 1:
            case 2:
            case 3:
                text = 'Mainly clear, partly cloudy, and overcast';
                break;
            case 45:
            case 48:
                text = 'Fog and depositing rime fog';
                break;
            case 51:
            case 53:
            case 55:
                text = 'Drizzle: Light, moderate, and dense intensity';
                break;
            case 56:
            case 57:
                text = 'Freezing Drizzle: Light and dense intensity';
                break;
            case 61:
            case 63:
            case 65:
                text = 'Rain: Slight, moderate and heavy intensity';
                break;
            case 66:
            case 67:
                text = 'Freezing Rain: Light and heavy intensity';
                break;
            case 71:
            case 73:
            case 75:
                text = 'Snow fall: Slight, moderate, and heavy intensity';
                break;
            case 77:
                text = 'Snow grains';
                break;
            case 80:
            case 81:
            case 82:
                text = 'Rain showers: Slight, moderate, and violent';
                break;
            case 85:
            case 86:
                text = 'Snow showers slight and heavy';
                break;
            case 95:
                text = 'Thunderstorm: Slight or moderate';
                break;
            case 96, 99:
                text = 'Thunderstorm with slight and heavy hail';
                break;

            default:
                break;
        }

        return text;
    }

    return { getDescription }
}