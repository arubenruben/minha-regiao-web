import { ElectionResult } from "./ElectionResult";

export interface Election {
    year: number;
    results: ElectionResult[];
}