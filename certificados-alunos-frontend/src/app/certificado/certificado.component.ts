import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-certificado',
  templateUrl: './certificado.component.html',
  styleUrls: ['./certificado.component.scss'],
  host: {
    class: 'd-flex flex-column h-100'
  }
})
export class CertificadoComponent implements OnInit {

  user$ = this.authService.user$

  constructor(
    private authService: AuthService,
    private router: Router,
  ) { }

  ngOnInit(): void {
  }

  logout() {

    this.authService.logout()
      .subscribe(
        () => this.router.navigate(['/login'])
      )
  }
}
