import { Component, OnInit } from '@angular/core';
import {VehicleService} from "../../../services/vehicle.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor(
    private vehicleService: VehicleService,
  ) { }

  ngOnInit(): void {
  }

}
