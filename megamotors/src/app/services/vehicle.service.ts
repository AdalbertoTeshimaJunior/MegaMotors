import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class VehicleService {

  constructor(private http: HttpClient) { }

  listVehicles(): Observable<any> {
    return this.http.get(`http://localhost:8000/api/veiculos/`);
  }

  getVehicleById(id: any): Observable<any> {
    return this.http.get(`http://localhost:8000/api/veiculos/${id}`);
  }

  createVehicle(objParams: any): Observable<any> {
    return this.http.post(`http://localhost:8000/api/veiculos/`, objParams);
  }

  editVehicle(id: any, objParams: any): Observable<any> {
    return this.http.put(`http://localhost:8000/api/veiculos/${id}`, objParams);
  }

  deleteVehicle(id: any): Observable<any> {
    return this.http.delete(`http://localhost:8000/api/veiculos/${id}`);
  }
}
