import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-topo',
  templateUrl: './topo.component.html',
  styleUrls: ['./topo.component.scss']
})
export class TopoComponent implements OnInit {

  @Input() username: string | undefined = ''

  @Output() onLogout = new EventEmitter()

  constructor() { }

  ngOnInit(): void {
  }

  logout() {

    this.onLogout.emit()
  }
}
